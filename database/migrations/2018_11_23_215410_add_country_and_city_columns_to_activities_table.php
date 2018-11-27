<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountryAndCityColumnsToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
          $table->unsignedInteger('city_id')->nullable();
          $table->unsignedInteger('country_id')->nullable();
          $table->foreign('city_id')->references('id')->on('cities');
          $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Activities', function (Blueprint $table) {
          $table->dropForeign('countries_country_id_foreign');
          $table->dropForeign('cities_city_id_foreign');
          $table->dropColummn('country_id');
          $table->dropColummn('city_id');
        });
    }
}
