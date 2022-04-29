<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantDeleteController extends Controller
{
    public function confirm(Request $request, $id){

        $restaurant = Restaurant::find($id);

        //View
        return view ('restaurant.delete',[
            "restaurant" => $restaurant
        ]);
    }

    public function delete(Request $request, $id){


        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        return redirect()->route("restaurant.index");



    }
}
