<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $table = 'restaurant_list';
    protected $fillable = [
        "name",
        "visited_date",
        "companion",
        "rating",
        "taste",
        "atmosphere",
        "service",
        "cleanness",
        "money"
    ];


}
