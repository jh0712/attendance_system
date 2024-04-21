<?php

namespace Modules\Translation\Repositories;

use Carbon\Carbon;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Translation\Contracts\TranslatorGroupContract;
use Modules\Translation\Contracts\TranslatorLanguageContract;
use Modules\Translation\Contracts\TranslatorPageContract;
use Modules\Translation\Contracts\TranslatorTranslationContract;
use Modules\Translation\Models\TranslatorPage;
use Modules\Translation\Models\TranslatorTranslation;

class TranslatorTranslationRepository extends Repository implements TranslatorTranslationContract
{
    use HasCrud;

    const ENGLISH = 1;

    protected $artisan;
    protected $model;
    protected $defaultLocale;
    protected $translatorPage;
    protected $translatorLanguage;
    protected $translatorGroup;

    public function __construct(
        TranslatorTranslation $model,
        Kernel $artisan,
        TranslatorPageContract $pageContract,
        TranslatorLanguageContract $languageContract,
        TranslatorGroupContract $groupContract
    ) {
        $this->artisan            = $artisan;
        $this->model              = $model;
        $this->defaultLocale      = 'en';
        $this->translatorPage     = $pageContract;
        $this->translatorLanguage = $languageContract;
        $this->translatorGroup    = $groupContract;
    }

    public function updateTranslation($data)
    {
        $translation = $this->model->where('translator_language_id', $data['language_id'])
            ->where('key', $data['key'])
            ->where('translator_page_id', $data['translator_page_id'])
            ->first()
        ;

        if (!$translation) {
            $defaultTranslation                  = $this->getDefaultTranslation($data['key'], $data['translator_page_id']);
            $translation                         = new $this->model();
            $translation->translator_language_id = $data['language_id'];
            $translation->translator_page_id     = $defaultTranslation ? $defaultTranslation->translator_page_id : $data['translator_page_id'];
            $translation->key                    = $data['key'];
        }

        $translation->value = $data['value'];

        $translation->save();

        $this->artisan->call('translation:generate_files');
    }

    public function updateTranslationByKey($data)
    {
        $this->model->where('translator_language_id', $data['language_id'])
            ->where('key', $data['key'])
            ->update([
                'value' => $data['value'],
            ])
        ;

        $this->artisan->call('translation:generate_files');
    }

    public function updateDefaultByKey($key, $value)
    {
        $defaultLanguage     = $this->translatorLanguage->getModel()->where('code', $this->defaultLocale)->first();
        $translatorLanguages = $this->translatorLanguage->allActive();
        $groups              = $this->translatorGroup->getModel()->all()->keyBy('prefix');
        $pages               = $this->translatorPage->getModel()->all()->keyBy('rawname');
        $pageName            = explode('.', $key);
        $pageId              = isset($pages[$pageName[0]]) ? $pages[$pageName[0]]->id : null;

        if (is_null($pageId)) {
            $extractGroupPrefix = explode('_', $pageName[0]);
            TranslatorPage::insert([
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'name'                => $pageName[0],
                'name_translation'    => $pageName[0],
                'translator_group_id' => isset($groups[$extractGroupPrefix[0]]) ? $groups[$extractGroupPrefix[0]]->id : null,
            ]);
            $pages  = $this->translatorPage->getModel()->all()->keyBy('rawname');
            $pageId = isset($pages[$pageName[0]]) ? $pages[$pageName[0]]->id : null;
        }

        $translation = $this->model->where('translator_language_id', $defaultLanguage->id)
            ->where('key', $pageName[1])
            ->when($pageId, function ($query) use ($pageId) {
                return $query->where('translator_page_id', $pageId);
            })
            ->first()
        ;

        if (!$translation) {
            $pageName = explode('.', $key);
            foreach ($translatorLanguages as $language) {
                $translation                         = new $this->model();
                $translation->translator_language_id = $language->id;
                $translation->translator_page_id     = $pageId;
                $translation->key                    = $pageName[1];
                $translation->value                  = $value;
                $translation->save();
            }
        } else {
            $translation->value = $value;
            $translation->save();
        }

        $this->artisan->call('translation:generate_files');

        return $translation;
    }

    public function updateDefaultByKey_BK($key, $value)
    {
        $defaultLanguage     = $this->translatorLanguage->getModel()->where('code', $this->defaultLocale)->first();
        $translatorLanguages = $this->translatorLanguage->allActive();
        $groups              = $this->translatorGroup->getModel()->all()->keyBy('prefix');
        $pages               = $this->translatorPage->getModel()->all()->keyBy('rawname');
        $pageName            = explode('.', $key);
        $pageId              = isset($pages[$pageName[0]]) ? $pages[$pageName[0]]->id : null;

        $translation = $this->model->where('translator_language_id', $defaultLanguage->id)
            ->where('key', $pageName[1])
            ->when($pageId, function ($query) use ($pageId) {
                return $query->where('translator_page_id', $pageId);
            })
            ->first()
        ;

        if (!$translation) {
            $pageName = explode('.', $key);
            if (!isset($pages[$pageName[0]])) {
                $extractGroupPrefix = explode('_', $pageName[0]);

                TranslatorPage::insert([
                    'created_at'          => Carbon::now(),
                    'updated_at'          => Carbon::now(),
                    'name'                => $pageName[0],
                    'name_translation'    => $pageName[0],
                    'translator_group_id' => isset($groups[$extractGroupPrefix[0]]) ? $groups[$extractGroupPrefix[0]]->id : null,
                ]);

                $page                = $this->translatorPage->findBySlug($pageName[0]);
                $pageId              = $page->id;
                $pages[$pageName[0]] = $page;

                // Insert into translation
                foreach ($translatorLanguages as $language) {
                    $translation                         = new $this->model();
                    $translation->translator_language_id = $language->id;
                    $translation->translator_page_id     = $this->translatorPage->findBySlug('s_translator_pages')->id;
                    $translation->key                    = $pageName[0];
                    $translation->value                  = $pageName[0];
                    $translation->save();
                }
            }

            foreach ($translatorLanguages as $language) {
                $translation                         = new $this->model();
                $translation->translator_language_id = $language->id;
                $translation->translator_page_id     = $pageId;
                $translation->key                    = $pageName[1];
                $translation->value                  = $value;
                $translation->save();
            }
        } else {
            $translation->value = $value;
            $translation->save();
        }

        $this->artisan->call('translation:generate_files');

        return $translation;
    }

    /**
     * @see \Modules\Translation\Contracts\TranslatorTranslationContract::loadSource()
     *
     * @param null|mixed $translatorLangId
     */
    public function loadSource($translatorLangId = null)
    {
        return $this->model::join('translator_languages', 'translator_languages.id', 'translator_translations.translator_language_id')
            ->join('translator_pages', 'translator_pages.id', 'translator_translations.translator_page_id')
            ->select(['translator_translations.*', 'translator_languages.code', DB::raw("CONCAT(translator_pages.name,'.',translator_translations.key) as translation_key")])
            ->when($translatorLangId, function ($query, $translatorLangId) {
                return $query->where('translator_languages.id', $translatorLangId);
            })
        ;
    }

    /**
     * @see \Modules\Translation\Contracts\TranslatorTranslationContract::loadSource()
     *
     * @param mixed $locale
     * @param mixed $pageId
     * @param mixed $key
     */
    public function findByKey($locale, $pageId, $key)
    {
        $language = $this->translatorLanguage->findBySlug($locale);

        return $this->model->where('translator_language_id', $language->id)
            ->where('translator_page_id', $pageId)
            ->where('key', $key)
            ->first()
        ;
    }

    public function getDataTable()
    {
        $model  = app(TranslatorTranslation::class);
        $query  = $model->newQuery();
        $select = [
            'translator_translations.id as translator_translation_id',
            'translator_translations.key as translator_translation_key',
            'translator_translations.value as translator_translation_value',
            'translator_pages.name as translator_page_raw',
            'translator_languages.code as translator_language_code',
            'translator_languages.name as translator_language_raw',
            'translator_languages.id as translator_language_id',
            DB::raw('CONCAT(translator_pages.name, ".", translator_translations.key) as translation_name'),
        ];

        $query
            ->joinRelationship('pages')
            ->joinRelationship('language')
        ;

        return $query->select($select);
    }

    protected function getDefaultTranslation($key, $translatorPageId)
    {
        return $this->model->where('translator_language_id', static::ENGLISH)
            ->where('translator_page_id', $translatorPageId)
            ->where('key', $key)
            ->first()
        ;
    }
}
