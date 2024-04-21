<?php

namespace Modules\Translation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Modules\Translation\Contracts\TranslatorLanguageContract;
use Modules\Translation\Contracts\TranslatorTranslationContract;
use Modules\Translation\Queries\Admin\TranslationQuery;

class TranslationsController extends Controller
{
    private $translationQuery;
    private $translationRepository;
    private $languageRepository;

    public function __construct(
        TranslationQuery $translationQuery,
        TranslatorTranslationContract $translationRepository,
        TranslatorLanguageContract $translatorLanguageContract
    ) {
//        $this->middleware('permission:admin_translation_list')->only('index');
//        $this->middleware('permission:admin_translation_edit')->only('update');

        $this->translationQuery      = $translationQuery;
        $this->translationRepository = $translationRepository;
        $this->languageRepository    = $translatorLanguageContract;
    }

    public function index(Request $request)
    {
        $translations = $this->translationQuery
            ->setParameters($request->all())
            ->paginate();

        $languages = $this->languageRepository->allActive();

        $translationCollection = $this->translationRepository->getModel()->whereIn('key', $translations->pluck('key'))
                ->get(['id', 'translator_language_id', 'translator_page_id', 'key', 'value'])
                ->groupBy('translator_language_id');

        $localeTranslations = [];

        foreach ($translationCollection as $langId => $translationItem) {
            foreach ($translationItem as $item) {
                $localeTranslations[$langId][$item->translator_page_id][$item->key] = $item;
            }
        }

        return view('translation::index', compact('translations', 'localeTranslations', 'languages'));
    }

    public function update(Request $request, $id)
    {
        $this->translationRepository->edit($id, $request->only('value'));

        Artisan::call('translation:generate_files');

        return response()->json(['message' => __('s_translations.translation updated successfully')]);
    }
}
