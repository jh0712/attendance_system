<?php

namespace Modules\Kh\Traits;

trait HasActiveScope
{
    /**
     * The active column
     * @var string
     */
    protected $activeCol = 'is_active';

    /**
     * Local scope for active
     * @param unknown $query
     * @return unknown
     */
    public function scopeActive($query)
    {
        return $query->where($this->getTable() . '.' . $this->activeCol, 1);
    }

    /**
     * Local scope for inactive
     * @param unknown $query
     * @return unknown
     */
    public function scopeInactive($query)
    {
        return $query->where($this->getTable() . '.' . $this->activeCol, 0);
    }
}
