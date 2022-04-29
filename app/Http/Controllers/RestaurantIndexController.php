<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantIndexController extends Controller
{
    public function index(){

        //新着10件をApp/Recipe取得
        $restaurants = Restaurant::orderBy("id","desc")
            ->paginate(10);

        //View
        return view ('restaurant.index',[
            "restaurant_list" => $restaurants
        ]);
    }
}