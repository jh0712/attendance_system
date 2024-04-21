<?php

namespace Modules\Translation\Repositories;

use Illuminate\Foundation\Application;
use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasActive;
use Modules\Kh\Traits\HasCache;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\Translation\Contracts\TranslatorLanguageContract;
use Modules\Translation\Models\TranslatorLanguage;

class TranslatorLanguageRepository extends Repository implements TranslatorLanguageContract
{
    use HasCrud, HasSlug, HasActive,HasCache;

    /**
     * Class constructor
     *
     * @param Application $app
     * @param Country $model
     */
    public function __construct(TranslatorLanguage $model)
    {
        $this->slug = 'code';
        parent::__construct($model);
    }
}
