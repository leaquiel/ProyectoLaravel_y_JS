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
        // $ch = curl_init("https://restcountries.eu/rest/v2/all");
        //
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //
        // $output = curl_exec($ch);
        //
        // curl_close($ch);
        //
        // $countries = json_decode($output, true);
        //
        // $finalCountriesArray = [];
        //
        // foreach ($countries as $country) {
        //   $finalCountriesArray[] = $country['name'];
        // }
        //
        // // App\Country::create(['name' => 'Argentina']);
        //
        // foreach ($finalCountriesArray as $country) {
        //   App\Country::create(['name' => $country]);
        // }

        // App\Country::create(['name' => 'Argentina']);
        $countries = factory(App\Country::class)->times(19)->create();
        $countries->push(App\Country::create(['name' => 'Argentina']));

        $cities = factory(App\City::class)->times(20)->create();
        $activities = factory(App\Activity::class)->times(15)->create();
        $users = factory(App\User::class)->times(5)->create();

        // Activity_User <----Relaciones
        for ($i = 0; $i < count($activities); $i++) {
          $use = $users[rand(0,4)];
          $use->activities()->save($activities[$i]);
          // $activities[$i]->users()->save($use);
        }

        // City <-- country
        // for ($i = 0; $i < count($cities); $i++) {
        //   $cities[$i]->country()->associate($countries[rand(0,19)])->save();
        // }

        // activity <-- country
        // activity <-- city
        for ($i = 0; $i < count($activities); $i++) {
          $cit = $cities[rand(0,19)];
          $coun = $countries[rand(0,19)];
          $cit->activities()->save($activities[$i]);
          $coun->activities()->save($activities[$i]);
        }

        // User <-- ccountry
        for ($i = 0; $i < count($users); $i++) {
          $country = $countries[rand(0,19)];
          $country->users()->save($users[$i]);
        }
    }
}
