<?php

namespace Modules\Translation\Repositories;

use Illuminate\Foundation\Application;
use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\Translation\Contracts\TranslatorPageContract;
use Modules\Translation\Models\TranslatorPage;

class TranslatorPageRepository extends Repository implements TranslatorPageContract
{
    use HasCrud, HasSlug;

    /**
     * Class constructor
     *
     * @param Application $app
     * @param Country $model
     */
    public function __construct(TranslatorPage $model)
    {
        parent::__construct($model);
    }
}
