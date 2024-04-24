<?php

namespace Modules\Member\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Member\Database\factories\MemberFactory;

class Member extends Model
{
    use HasFactory;
    protected $guarded = [];
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
    protected static function newFactory(): MemberFactory
    {
        return MemberFactory::new();
    }
}
