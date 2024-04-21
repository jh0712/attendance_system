<?php

namespace Modules\Kh\Traits;

trait HasActive
{
    /**
     * The column for active flag
     * @var string
     */
    protected $activeColumn   = 'is_active';
    protected $blockCountries = ['Belgium', 'Japan', 'United States', 'New Zealand'];

    /**
     * Retrieve records by filtering the active column
     * @param boolean $isActive
     * @param array $with
     * @param array $select
     * @param array $sort ['column' => 'order']
     * @return \Illuminate\Support\Collection
     */
    public function filter($isActive, $perPage = 0, array $with = [], $select = ['*'], $sort = ['created_at' => 'desc'])
    {
        $results = $this->model->with($with);

        foreach ($sort as $column => $order) {
            $results->orderBy($column, $order);
        }

        $results->where($this->activeColumn, $isActive);

        return $perPage ? $results->paginate($perPage, $select) : $results->get($select);
    }

    /**
     * Retrieve all active records.
     * @param array $with
     * @param number $perPage
     * @param array $select
     * @return \Illuminate\Support\Collection
     */
    public function allActive(array $with = [], $perPage = 0, $select = ['*'], $sort = ['created_at' => 'desc'])
    {
        $results = $this->model->with($with);

        foreach ($sort as $column => $order) {
            $results->orderBy($column, $order);
        }

        $results->where($this->activeColumn, 1);

        return $perPage ? $results->paginate($perPage, $select) : $results->get($select);
    }

    public function allActiveExcludeBlock(array $with = [], $perPage = 0, $select = ['*'], $sort = ['created_at' => 'desc'], $block = 0)
    {
        $results = $this->model->with($with);

        foreach ($sort as $column => $order) {
            $results->orderBy($column, $order);
        }

        $results->where($this->activeColumn, 1);
        if ($block) {
            $results->whereNotIn('name', $this->blockCountries);
        }

        return $perPage ? $results->paginate($perPage, $select) : $results->get($select);
    }

    /**
     * Retrieve all inactive records.
     * @param array $with
     * @param number $perPage
     * @param array $select
     * @return \Illuminate\Support\Collection
     */
    public function allInactive(array $with = [], $perPage = 0, $select = ['*'], $sort = ['created_at' => 'desc'])
    {
        $results = $this->model->with($with);

        foreach ($sort as $column => $order) {
            $results->orderBy($column, $order);
        }

        $results->where($this->activeColumn, 0);

        return $perPage ? $results->paginate($perPage, $select) : $results->get($select);
    }
}
