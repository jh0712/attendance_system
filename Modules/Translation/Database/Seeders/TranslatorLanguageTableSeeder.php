<?php

namespace Modules\Translation\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Translation\Models\TranslatorLanguage;

class TranslatorLanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();

        TranslatorLanguage::insert([
            [
                'code'       => 'zh-cn',
                'name'       => '简体中文',
                'created_at' => $today,
                'updated_at' => $today,
                'is_active'  => true
            ],
            [
                'code'       => 'zh-tw',
                'name'       => '繁体中文',
                'created_at' => $today,
                'updated_at' => $today,
                'is_active'  => true
            ],
            [
                'code'       => 'en',
                'name'       => 'English',
                'created_at' => $today,
                'updated_at' => $today,
                'is_active'  => true
            ],
        ]);
    }
}
