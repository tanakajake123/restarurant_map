<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdressToRestaurant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurant_list', function (Blueprint $table) {
            //
            $table->string("address")->nullable();
            $table->string("image_path2")->nullable();
            $table->string("image_path3")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant_list', function (Blueprint $table) {
            //
            $table->dropColumn('address');
            $table->dropColumn('image_path2');
            $table->dropColumn('image_path3');

        });
    }
}
