<?php

namespace Modules\Member\Repositories;

use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\Member\Entities\Member;
use Modules\Member\Contracts\MemberContract;

class MemberRepository extends Repository implements MemberContract
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
    public function __construct(Member $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
}
