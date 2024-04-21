<?php

namespace Modules\Country\Repositories;

use Modules\Kh\Traits\HasActive;
use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\Country\Entities\Country;
use Modules\Country\Contracts\CountryContract;

class CountryRepository extends Repository implements CountryContract
{
    use HasCrud, HasSlug,HasActive;

    /**
     * The model.
     *
     * @var unknown
     */
    protected $model;

    /**
     * Class constructor.
     *
     * @param DepositCryptoTransfer  $model
     */
    public function __construct(Country $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
}
