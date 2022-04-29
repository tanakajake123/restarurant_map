<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Restaurant_list;
use Illuminate\Http\Request;

class RestaurantPageController extends Controller
{

    public function create(){
        return view ('restaurant.create');
    }

    public function store(Request $request){

        // Restaurant_list::create($request->all());

        $name = $request->input("name");
        // $visited_date = $request->input("visited_date");
        $companion = $request->input("companion");
        $rating = $request->input("rating");

// "rating",
// "taste",
// "atmosphere",
// "service",
// "cleanness",
// "money"


        //store into db
        $restaurant = new Restaurant();
        $restaurant->name = $name;
        // $restaurant->visited_date = $visited_date;
        $restaurant->companion = $companion;
        $restaurant->rating = $rating;
        $restaurant->save();

        return redirect()->route("restaurant.create.complete");
    }

    public function complete(){
        return view ('restaurant.complete');
    }

}