<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestaurantIndexController extends Controller
{
    public function index(){

        //新着10件をApp/Recipe取得
        $restaurants = Restaurant::orderBy("id","desc")
            //->where("user_id","=", Auth::id())
            ->paginate(10);

        //View
        return view ('restaurant.index',[
            "restaurant_list" => $restaurants
        ]);
    }

    public function map(Request $req){

        $lat = $req->input("lat", 35.7292261108173);
        $lng = $req->input("lng", 139.2351152849181);


        //直線距離を測るためのSQL
		$lineString = "'LineString(',:lat,' ',:lng,', ',ST_X(location),' ',ST_Y(location),')'";

		$columns = implode(",", [
			"id",

			"name",

			//距離を取り出すカラム
			'ST_Length(ST_GeomFromText(CONCAT(' . $lineString . '))) as distance',

			//緯度経度を取り出すカラム
			"ST_X(location) as latitude",
			"ST_Y(location) as longitude"
		]);

		$query = DB::table("restaurant_list")
			->selectRaw($columns, [
				":lat" => $lat,
				":lng" => $lng
			])
            ->whereNotNull("location")
			->orderBy("distance");

        $restaurants = $query->limit(10)->get()->filter(function($restaurant){
            //return $restaurant->distance < 0.45;
            return true;
        });

        $latitude = 0;
        $longitude = 0;

        $count = 0;
        $markers = [];
        foreach($restaurants as $lat_lng){

            $latitude += $lat_lng->latitude;
            $longitude += $lat_lng->longitude;
            $count++;

            $markers[] = [
                "title" => $lat_lng->name,
                "latitude" => $lat_lng->latitude,
                "longitude" => $lat_lng->longitude,
                "distance" => $lat_lng->distance
            ];
        }
        $latitude = $latitude / $count;
        $longitude = $longitude / $count;

        //View
        return view ('restaurant.map',[
            "restaurant_list" => $restaurants,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "markers" => $markers
        ]);
    }
}