<?php

namespace Modules\Kh\Contracts;

interface ActiveContract
{
    /**
     * Retrieve records by filtering the active column
     * @param boolean $isActive
     * @param array $with
     * @param array $select
     * @param array $sort ['column' => 'order']
     * @return \Illuminate\Support\Collection
     */
    public function filter($isActive, $perPage = 0, array $with = [], $select = ['*'], $sort = ['created_at' => 'desc']);

    /**
     * Retrieve all active records.
     * @param array $with
     * @param array $select
     * @param array $sort ['column' => 'order']
     * @return \Illuminate\Support\Collection
     */
    public function allActive(array $with = [], $perPage = 0, $select = ['*'], $sort = ['created_at' => 'desc']);

    /**
     * Retrieve all active records exlucde block
     * @param array $with
     * @param array $select
     * @param array $sort ['column' => 'order']
     * @return \Illuminate\Support\Collection
     */
    public function allActiveExcludeBlock(array $with = [], $perPage = 0, $select = ['*'], $sort = ['created_at' => 'desc'], $block = 0);

    /**
     * Retrieve all inactive records.
     * @param array $with
     * @param array $select
     * @param array $sort ['column' => 'order']
     * @return \Illuminate\Support\Collection
     */
    public function allInactive(array $with = [], $perPage = 0, $select = ['*'], $sort = ['created_at' => 'desc']);
}
