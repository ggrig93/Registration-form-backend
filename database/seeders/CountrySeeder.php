<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $getCountries= file_get_contents(public_path('storage/countries.json'));
        $countries = json_decode($getCountries, true);
        Country::insert($countries);
    }
}
