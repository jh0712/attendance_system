<?php

namespace Modules\Translation\Traits;

use Illuminate\Support\Facades\DB;
use Modules\Translation\Models\TranslatorLanguage;

trait DatatableQuery
{
    public function concatName()
    {
        $translatorLanguage = TranslatorLanguage::all();
        foreach ($translatorLanguage as $val) {
            // $code    = str()->replace('-', '_', $val->code);
            $array[] = DB::raw(
                "MAX(CASE WHEN translator_languages.code='".$val->code."'
                THEN translator_translations.value ELSE 0
                END)
                as 'value_".$val->code."'"
            );
            $array[] = DB::raw(
                "MAX(CASE WHEN translator_languages.code='".$val->code."'
                THEN translator_translations.id ELSE 0
                END)
                as 'id_".$val->code."'"
            );
        }

        return $array;
    }

    public function emptyName()
    {
        $translatorLanguage = TranslatorLanguage::all();
        foreach ($translatorLanguage as $val) {
            // $code    = str()->replace('-', '_', $val->code);
            $array[] = DB::raw('concat("") as value_'.$val->code.'');
            $array[] = DB::raw('concat("") as id_'.$val->code.'');
        }

        return $array;
    }

    public function emptyData()
    {
        $array = [
            DB::raw('concat("") as id'),
            DB::raw('concat("") as key'),
            DB::raw('concat("") as group_name'),
            DB::raw('concat("") as page_name'),
        ];

        return $this->translatorTranslationRepo->getModel()
            ->joinRelationship('language')
            ->joinRelationship('pages.groups')
            ->select(array_merge($array, $this->emptyName()))
            ->whereNull('id')
        ;
    }

    public function getListData()
    {
        $array = [
            // DB::raw('row_number() over ( order by translator_translations.id) id'),
            'translator_translations.id',
            'translator_translations.key',
            'translator_groups.name as group_name',
            'translator_pages.name as page_name',
        ];
        $array_t = array_merge($array, $this->concatName());

        return $this->translatorTranslationRepo->getModel()
            ->joinRelationship('language')
            ->joinRelationship('pages.groups')
            ->select(array_merge($array, $this->concatName()))
            ->groupBy('translator_translations.key')
        ;
    }
}
