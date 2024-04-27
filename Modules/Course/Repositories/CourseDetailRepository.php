<?php

namespace Modules\Course\Repositories;

use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\Course\Entities\CourseDetail;
use Modules\Course\Contracts\CourseDetailContract;

class CourseDetailRepository extends Repository implements CourseDetailContract
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
    public function __construct(CourseDetail $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
}
