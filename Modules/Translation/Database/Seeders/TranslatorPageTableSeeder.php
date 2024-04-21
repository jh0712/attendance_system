<?php

namespace Modules\Translation\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Translation\Models\TranslatorPage;

class TranslatorPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $pages = [
            [
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'name'             => 's_translator_pages',
                'name_translation' => 's_translator_pages',
            ],
            [
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'name'             => 's_transaction_types',
                'name_translation' => 's_transaction_types',
            ],
            [
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'name'             => 's_credit_types',
                'name_translation' => 's_credit_types',
            ],
            [
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
                'name'             => 's_settings',
                'name_translation' => 's_settings',
            ],
        ];
        TranslatorPage::insert($pages);
    }
}
