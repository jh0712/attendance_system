<?php

namespace Modules\Course\Repositories;

use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\Course\Entities\CourseMemberMapping;
use Modules\Course\Contracts\CourseMemberMappingContract;

class CourseMemberMappingRepository extends Repository implements CourseMemberMappingContract
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
     * @param   $model
     */
    public function __construct(CourseMemberMapping $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
}
