<?php

namespace Modules\Translation\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Translation\Models\TranslatorGroup;

class TranslatorGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $groups = [
            [
                'name'   => 'system',
                'prefix' => 's',
            ],
            [
                'name'   => 'admin',
                'prefix' => 'a',
            ],
            [
                'name'   => 'member',
                'prefix' => 'm',
            ]
        ];

        foreach ($groups as $group) {
            $newGroup = new TranslatorGroup($group);
            $newGroup->save();
        }
    }
}
