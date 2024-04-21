<?php

namespace Modules\Translation\Contracts;

use Modules\Kh\Contracts\CrudContract;

interface TranslatorTranslationContract extends CrudContract
{
    /**
     *  Update translation
     *
     *  @param  unknown $data
     *  @return mixed
     */
    public function updateTranslation($data);

    /**
     *  Update translation by key
     *
     *  @param  unknown $key
     *  @param  unknown $value
     *  @return mixed
     */
    public function updateTranslationByKey($data);

    /**
     *  Update default by key
     *
     *  @param  unknown $key
     *  @param  unknown $value
     *  @return mixed
     */
    public function updateDefaultByKey($key, $value);

    /**
     *  Return all translations items formatted by $translatorLangId
     *
     *  @param  int $translatorLangId
     *  @return Collection
     */
    public function loadSource($translatorLangId = null);

    /**
     *  Find translation by key
     *
     *  @param  unknown $locale
     *  @param  unknown $pageId
     *  @param  unknown $key
     *  @return TranslatorTranslation
     */
    public function findByKey($locale, $pageId, $key);
}
