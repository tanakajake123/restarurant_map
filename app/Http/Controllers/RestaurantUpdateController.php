<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantUpdateController extends Controller
{
    public function edit(Request $request, $id){

        $restaurant = Restaurant::find($id);

        if($restaurant->user_id != Auth::id()){
            return redirect()->route("restaurant.index")->withErrors("自分が作ったDataではありません");
        }

        //View
        return view ('restaurant.edit',[
            "restaurant" => $restaurant
        ]);
    }

    public function update(Request $request, $id){

        $name = $request->input("name");
        $visited_date = $request->input("visited_date");
        $companion = $request->input("companion");
        $rating = $request->input("rating");
        $taste = $request->input("taste");
        $atmosphere = $request->input("atmosphere");
        $service = $request->input("service");
        $cleanliness = $request->input("cleanliness");
        $money = $request->input("money");
        $location = $request->input("location");



        //store into db
        //$contact = new Contact();
        $restaurant = Restaurant::find($id);
        $restaurant->name = $name;
        $restaurant->id = $id;
        $restaurant->visited_date = $visited_date;
        $restaurant->companion = $companion;
        $restaurant->rating = $rating;
        $restaurant ->taste = $taste;
        $restaurant ->atmosphere = $atmosphere;
        $restaurant ->service = $service;
        $restaurant ->cleanliness = $cleanliness;
        $restaurant ->money = $money;


        $image = $request->file("image");
        if($image){
            $image_path = $image->store("public");
            $restaurant->image_path = $image_path;
        }
        $image2 = $request->file("image2");
        if($image2){
            $image_path2 = $image2->store("public");
            $restaurant->image_path2 = $image_path2;
        }
        $image3 = $request->file("image3");
        if($image3){
            $image_path3 = $image3->store("public");
            $restaurant->image_path3 = $image_path3;
        }

        $restaurant->location = $location;

        $restaurant->save();


        return redirect()->route("restaurant.show", $restaurant->id)->with('status',"Saved");;



    }
}
