<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $countries = factory(App\Country::class)->times(20)->create();
        $cities = factory(App\City::class)->times(20)->create();
        $activities = factory(App\Activity::class)->times(5)->create();
        $users = factory(App\User::class)->times(5)->create();

        // City <-- country
        for ($i = 0; $i < count($cities); $i++) {
          $cities[$i]->country()->associate($countries[rand(0,19)])->save();
        }

        // activity <-- country
        // activity <-- city
        for ($i = 0; $i < count($activities); $i++) {
          $cit = $cities[rand(0,19)];
          $coun = $countries[rand(0,19)];
          $cit->activities()->save($activities[$i]);
          $coun->activities()->save($activities[$i]);
        }

        // User <-- city
        for ($i = 0; $i < count($users); $i++) {
          $cit = $cities[rand(0,19)];
          $cit->users()->save($users[$i]);
        }
    }
}
