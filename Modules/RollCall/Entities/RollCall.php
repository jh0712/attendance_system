<?php

namespace Modules\RollCall\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Kh\Contracts\Stateable;
use Modules\Kh\Traits\HistoryRelation;

class RollCall extends Model implements Stateable
{
    use SoftDeletes, HistoryRelation;
    protected $fillable = [
    ];

    /**
     * This model's relation to user status histories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    /**
     * Get the state id
     * @return mixed
     */
    public function getEntityId()
    {
        // return $this->id;
    }

    /**
     * Get the foreign key
     * @return string
     */
    public function getForeignKey()
    {
        // return 'client_deposit_id';
    }
}
