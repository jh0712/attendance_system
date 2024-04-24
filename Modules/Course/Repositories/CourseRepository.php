<?php

namespace Modules\Course\Repositories;

use Modules\Kh\Repositories\Repository;
use Modules\Kh\Traits\HasCrud;
use Modules\Kh\Traits\HasSlug;
use Modules\Course\Entities\Course;
use Modules\Course\Contracts\CourseContract;

class CourseRepository extends Repository implements CourseContract
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
     * @param  $model
     */
    public function __construct(Course $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
}
