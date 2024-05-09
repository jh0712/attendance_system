<?php

namespace Modules\RollCall\Repositories;

use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\RollCall\Entities\RollCall;
use Modules\RollCall\Contracts\RollCallContract;

class RollCallRepository extends Repository implements RollCallContract
{
    use HasCrud, HasSlug;

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
    public function __construct(RollCall $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
}
