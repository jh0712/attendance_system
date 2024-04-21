<?php

namespace Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\Kh\Traits\HasSeeder;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;
class DatabaseSeeder extends Seeder
{
    use \Modules\Kh\Traits\HasSeeder;

    public function defaultSeeder()
    {
        return [
        ];
    }

    public function skipString()
    {
        return [
            //'TranslationPermissionsSeeder',
            // "PermissionBaseSeeder",
            // "RbacPermissionsSeeder",
            //'CreateTestAmountTableSeeder',
        ];
    }

    public function firstSortting(array $seeder_list)
    {
        // Old seerder named
        $sortting = [
            'TranslatorLanguage',
            'TranslatorPage',
            'TranslatorGroup',
            'status',
            'type',
        ];
        // New seerder named
        $sortting_by_time = [];

        foreach ($sortting as $val) {
            ${$val} = [];
        }

        foreach ($seeder_list as $c_key => $class) {
            if (str_contains($class, '_')) {
                $explode_arr             = explode('_', $class);
                $time                    = $explode_arr[1].'_'.$explode_arr[2].'_'.$explode_arr[3].'_'.$explode_arr[4];
                $sortting_by_time[$time] = $class;
                unset($seeder_list[$c_key]);
            } else {
                foreach ($sortting as $sortting_name) {
                    if (isset($seeder_list[$c_key])) {
                        if (strpos(strtolower($class), strtolower($sortting_name)) !== false) {
                            ${$sortting_name}[] = $seeder_list[$c_key];
                            unset($seeder_list[$c_key]);
                        }
                    }
                }
            }
        }

        $first_sortting = [];
        foreach ($sortting as $s_val) {
            $first_sortting = array_merge($first_sortting, ${$s_val});
        }

        // Secound sorting for first sorting list
        $first_sortting = array_merge($first_sortting, $this->sortting_by_array($this->getSorttingType(), $seeder_list));

        // Sortting by key
        ksort($sortting_by_time);

        return [
            'seeder_list'    => array_values($sortting_by_time),
            'first_sortting' => $first_sortting,
        ];
    }

    public function sortting_by_array($sortting_type, $first_sortting)
    {
        foreach ($sortting_type as $val) {
            ${$val} = [];
        }

        foreach ($first_sortting as $c_key => $class) {
            foreach ($sortting_type as $sortting_name) {
                if (isset($first_sortting[$c_key])) {
                    if (strpos(strtolower($class), strtolower($sortting_name)) !== false) {
                        ${$sortting_name}[] = $first_sortting[$c_key];
                        unset($first_sortting[$c_key]);
                    }
                }
            }
        }

        foreach ($sortting_type as $s_val) {
            $first_sortting = array_merge($first_sortting, ${$s_val});
        }

        return $first_sortting;
    }

    protected function getSeeders()
    {
        $seeder_list  = [];
        $modules_json = File::get(base_path('modules_statuses.json'));
        $modules_list = json_decode($modules_json);
        foreach ($modules_list as $modules_name => $true) {
            if ($true) {
                $path         = module_path($modules_name, 'Database\/\/Seeders');
                $seeder_files = glob($path.'/*.{php}', GLOB_BRACE);
                foreach ($seeder_files as $seeder) {
                    $skip_permission = $this->skipString();
                    $class_name      = Str::before(class_basename($seeder), '.php');
                    if (!in_array($class_name, $skip_permission)) {
                        $seeder_class  = resolve('Modules\\'.$modules_name.'\\Database\\Seeders\\'.$class_name);
                        $seeder_list[] = get_class($seeder_class);
                    }
                }
            }
        }

        $data                   = $this->firstSortting($seeder_list);
        $data['first_sortting'] = array_merge($data['first_sortting'], $this->defaultSeeder());

        return array_merge($data['first_sortting'], $data['seeder_list']);
    }

    private function getSorttingType()
    {
        return [
            'create',
            'add',
            'update',
            'upsert',
            'delete',
            'permissions',
        ];
    }

}
