<?php

namespace Modules\Translation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Translation\Models\TranslatorTranslation;

class TestController extends Controller
{
    public function index()
    {
        $data = [];
        DB::beginTransaction();
        try {
            $oldTranslation = DB::table('old_translator_translations')->select('*', DB::raw('concat(translator_language,"_",old_translator_translations.key) as translation_key'))->get()->keyBy('translation_key');

            $translations = TranslatorTranslation::leftjoin('translator_languages', 'translator_languages.id', '=', 'translator_translations.translator_language_id')->select('translator_translations.*', 'translator_languages.code')->get();
            foreach ($translations as $translation) {
                if (isset($oldTranslation[$translation->code . '_' . $translation->key])) {
                    $existingValue      = $oldTranslation[$translation->code . '_' . $translation->key];
                    $translation->value = $existingValue->value;
                    $translation->save();
                }
            }
            DB::commit();
            return "Done";
        } catch (\Exception $e) {
            DB::rollback();
            return "Try again";
        }
    }
}
