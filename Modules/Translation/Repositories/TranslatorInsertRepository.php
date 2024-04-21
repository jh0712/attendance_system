<?php

namespace Modules\Translation\Repositories;

use Illuminate\Contracts\Console\Kernel;
use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasMultiCurd;
use Modules\Kh\Traits\HasSlug;
use Modules\Translation\Contracts\TranslatorGroupContract;
use Modules\Translation\Contracts\TranslatorInsertContract;
use Modules\Translation\Contracts\TranslatorLanguageContract;
use Modules\Translation\Contracts\TranslatorPageContract;
use Modules\Translation\Models\TranslatorTranslation;

class TranslatorInsertRepository extends Repository implements TranslatorInsertContract
{
    use HasCrud, HasSlug, HasMultiCurd;

    protected $model;
    protected $translatorPage;
    protected $translatorLanguage;
    protected $translatorGroup;

    public function __construct(
        Kernel $artisan,
        TranslatorTranslation $model,
        TranslatorPageContract $pageContract,
        TranslatorLanguageContract $languageContract,
        TranslatorGroupContract $groupContract
    ) {
        $this->artisan            = $artisan;
        $this->model              = $model;
        $this->translatorPage     = $pageContract;
        $this->translatorLanguage = $languageContract;
        $this->translatorGroup    = $groupContract;
    }

    public function upsertTranslation($data_tran, $model)
    {
        // Check data in translatorPage find or new
        $trans_page = $this->translatorPage->firstOrCreate(
            ['name' => 's_' . $model->getTable()],
            [
                'translator_group_id' => $this->translatorGroup->findBySlug('system')->id
            ]
        );

        $trans_lang = $this->translatorLanguage->all();
        $upsert     = [];
        foreach ($data_tran as $val) {
            if (isset($val['name_translation'])) {
                foreach ($trans_lang as $lang_arr) {
                    array_push($upsert, [
                        'translator_language_id' => $lang_arr->id,
                        'translator_page_id'     => $trans_page->id,
                        'key'                    => $val['name_translation'],
                        'value'                  => $val['name_translation'],
                    ]);
                }
            }
        }
        $this->artisan->call('translation:generate_files');
        return $this->model->upsert($upsert, ['translator_language_id', 'translator_page_id', 'key'], ['value']);
    }
    public function multiInsertTranslation($data_tran, $model)
    {
        // Check data in translatorPage find or new
        $trans_page = $this->translatorPage->firstOrCreate(
            ['name' => 's_' . $model->getTable()],
            [
                'translator_group_id' => $this->translatorGroup->findBySlug('system')->id
            ]
        );

        // Check data in translatorTranslation get diff value for array
        $trans_arr = $this->checkByArrayKey(
            $data_tran,
            ['translator_page_id' => $trans_page->id],
            'key'
        );
        $trans_lang  = $this->translatorLanguage->all();
        $data_insert = [];
        if (count($trans_arr['org_arr_diff']) > 0) {
            foreach ($trans_arr['org_arr_diff'] as $key => $value) {
                foreach ($trans_lang as $lang_arr) {
                    array_push($data_insert, [
                        'translator_language_id' => $lang_arr->id,
                        'translator_page_id'     => $trans_page->id,
                        'key'                    => $value['key_name'],
                        'value'                  => $key,
                        'created_at'             => $value['created_at'],
                        'updated_at'             => $value['updated_at'],
                    ]);
                }
            }
            // dd($data_insert, $trans_arr);
            return $this->model->insert($data_insert);
        }
        return false;
    }

    public function multiUpdateTranslation($key_name, $model, array $updated_arr)
    {
        // Check data in translatorPage find or new
        $trans_page = $this->translatorPage->firstOrNew(
            ['name' => 's_' . $model->getTable()],
            [
                'translator_group_id' => $this->translatorGroup->findBySlug('system')->id
            ]
        );
        // return $trans_page->id;
        if ($trans_page->id) {
            $result = $this->model
                ->where([
                    'key'                => $key_name,
                    'translator_page_id' => $trans_page->id
                ])
                ->update($updated_arr);

            $this->artisan->call('translation:generate_files');
            return $result;
        }
        return false;
    }
}
