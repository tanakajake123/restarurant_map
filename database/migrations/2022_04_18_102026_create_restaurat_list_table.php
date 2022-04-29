<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestauratListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_list', function (Blueprint $table) {

            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->date('visited_date');
            $table->string('companion');
            $table->string('rating');
            $table->string('taste');
            $table->string('atmosphere');
            $table->string('service');
            $table->string('cleanliness');
            $table->string('money');
            // $table->text('thoughts');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_list');
    }
}
