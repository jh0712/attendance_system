<?php

namespace Modules\Kh\Traits;

trait HasSoftDelete
{
    /**
     * Retrieve all trashed.
     * @param array $related
     * @param number $perPage
     * @param array $select
     * @return Illuminate\Support\Collection
     */
    public function trashed($related = [], $perPage = 0, $select = ['*'])
    {
        $trashed = $this->model->onlyTrashed()->with($related);
        return $perPage ? $trashed->paginate($perPage, $select) : $trashed->get($select);
    }

    /**
     * Retrieve a single record by id.
     * @param unknown $id
     * @param array $related
     * @param array $select
     * @return Illuminate\Database\Eloquent\Model
     */
    public function findTrashed($id, $related = [], $select = ['*'])
    {
        return $this->model->onlyTrashed()->with($related)->find($id);
    }

    /**
     * Restore a record.
     * @param unknown $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function restore($id)
    {
        $model = $this->findTrashed($id);
        if ($model) {
            $model->restore();
        }
        return $model;
    }
}
