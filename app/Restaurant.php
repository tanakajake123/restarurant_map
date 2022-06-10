<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        "money",
        "address"
    ];

    //relation
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getRatingStarAttribute(){
        $count = $this->rating * 1;
        return str_repeat("☆", $count);
    }

    public function setLocationAttribute($values) {
		$point = 'POINT(' . $values['latitude'] . ' ' . $values['longitude'] . ')';
		$this->attributes['location'] = DB::raw('ST_GeomFromText("' . $point . '")');
	}

    public function getLatLngAttribute() {
		$query = DB::table($this->table)
			->select(DB::raw("ST_X(location) as latitude, ST_Y(location) as longitude"))
			->where("id", "=", $this->id);

		$ret = $query->first();

		return [
			"latitude" => $ret->latitude,
			"longitude" => $ret->longitude,
		];
	}

}
