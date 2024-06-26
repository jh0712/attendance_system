<?php

namespace Modules\Kh\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Kh\Traits\HasSoftDelete;
use Modules\Kh\Traits\DynamicAttribute;
use Modules\Kh\Traits\Macroable;

abstract class Repository
{
    use Macroable;
    use DynamicAttribute;
    use HasSoftDelete;

    /**
     * The eloquent model.
     *
     * @var unknown
     */
    protected $model;

    /**
     * Class constructor.
     *
     * @param Container $app
     * @param Model     $model
     */
    public function __construct(Model $model = null)
    {
        $this->model = $model;
    }

    /**
     *  Return the model related to this finder.
     *
     *  @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function setModel(Model $model)
    {
        return $this->model = $model;
    }

    /**
     *  Check if the model's table exists.
     *
     *  @return bool
     */
    public function tableExists()
    {
        return $this->model->getConnection()->getSchemaBuilder()->hasTable($this->model->getTable());
    }

    /**
     * Returns total number of entries in DB.
     *
     * @return int
     */
    public function count()
    {
        return $this->model->count();
    }

}
