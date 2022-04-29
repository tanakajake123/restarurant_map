<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantUpdateController extends Controller
{
    public function edit(Request $request, $id){

        $restaurant = Restaurant::find($id);

        //View
        return view ('restaurant.edit',[
            "restaurant" => $restaurant
        ]);
    }

    public function update(Request $request, $id){

        $name = $request->input("name");
        // $id = $request->input("id");
        // $ingredients = $restaurant->input("ingredients");
        // $instructions = $restaurant->input("instructions");

        //store into db
        //$contact = new Contact();
        $restaurant = Restaurant::find($id);
        $restaurant->name = $name;
        $restaurant->id = $id;
        // $restaurant->ingredients = $ingredients;
        // $restaurant->instructions = $instructions;
        $restaurant->save();

        return redirect()->route("restaurant.show", $restaurant->id);



    }
}
