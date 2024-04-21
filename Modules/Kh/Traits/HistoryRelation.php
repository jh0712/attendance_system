<?php

namespace Modules\Kh\Traits;

trait HistoryRelation
{
    protected $historyModel;

    /**
     * Get the state id
     * @return mixed
     */
    public function getEntityId()
    {
        return $this->{$this->getEntityKey()};
    }

    /**
     * Get the state id
     * @return mixed
     */
    public function getEntityKey()
    {
        return 'id';
    }

    /**
     * This model's relation to support ticket status histories
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histories()
    {
        return $this->hasMany($this->historyModel, $this->getForeignKey());
    }

    /**
     * Getting model's current status
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasOne($this->historyModel, $this->getForeignKey())->current(1);
    }
}
