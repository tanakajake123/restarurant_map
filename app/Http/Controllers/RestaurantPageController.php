<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Restaurant_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantPageController extends Controller
{

    public function create(){
        return view ('restaurant.create');
    }

    public function store(Request $request){

        // Restaurant_list::create($request->all());

        $name = $request->input("name");
        $visited_date = $request->input("visited_date");
        $companion = $request->input("companion");
        $rating = $request->input("rating");
        $taste = $request->input("taste");
        $atmosphere = $request->input("atmosphere");
        $service = $request->input("service");
        $cleanliness = $request->input("cleanliness");
        $money = $request->input("money");
        $address = $request->input("address");

        //store into db
        $restaurant = new Restaurant();
        $restaurant->name = $name;
        $restaurant->visited_date = $visited_date;
        $restaurant->companion = $companion;
        $restaurant->rating = $rating;
        $restaurant->taste = $taste;
        $restaurant->atmosphere = $atmosphere;
        $restaurant->service = $service;
        $restaurant->cleanliness = $cleanliness;
        $restaurant->money = $money;
        $restaurant->address = $address;
        $restaurant->user_id = Auth::id();
        $restaurant->save();

        return redirect()->route("restaurant.create.complete");
    }

    public function complete(){
        return view ('restaurant.complete');
    }

}