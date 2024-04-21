<?php

namespace Modules\Translation\Repositories;

use Illuminate\Foundation\Application;
use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\Translation\Contracts\TranslatorGroupContract;
use Modules\Translation\Models\TranslatorGroup;

class TranslatorGroupRepository extends Repository implements TranslatorGroupContract
{
    use HasCrud, HasSlug;

    /**
     * Class constructor
     *
     * @param Application $app
     * @param Country $model
     */
    public function __construct(TranslatorGroup $model)
    {
        parent::__construct($model);
    }
}
