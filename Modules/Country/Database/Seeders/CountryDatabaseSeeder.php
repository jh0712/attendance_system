<?php

namespace Modules\Country\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Country\Entities\Country;

class CountryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $handle = fopen(__DIR__ . '/../../Data/countries.csv', "r");
        $header = true;
        while ($csvLine = fgetcsv($handle, 1000, ",")) {
            if ($header) {
                $header = false;
            } else {
                $country                = new Country();
                $country->name          = $csvLine[0];
                $country->code          = $csvLine[1];
                $country->dialling_code = $csvLine[2];
                $country->save();
            }
        }

        DB::commit();
    }
}
