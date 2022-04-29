<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Restaurant_list;
use Illuminate\Http\Request;

class RestaurantDetailController extends Controller
{
    function show(Request $request, $id){

        // $restaurant = Restaurant::where("id","=",$id)->first();
        $restaurant = Restaurant::find($id);

        //View
        return view ('restaurant.detail',[
            "restaurant" => $restaurant
        ]);
    }
}