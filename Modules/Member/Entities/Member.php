<?php

namespace Modules\Member\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Member\Database\factories\MemberFactory;
use Modules\Course\Entities\CourseMemberMapping;

class Member extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * This model's relation to user status histories.
     *
     * @return HasMany
     */
    public function course(): HasMany
    {
        return $this->hasMany(CourseMemberMapping::class, 'member_id');
    }

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
