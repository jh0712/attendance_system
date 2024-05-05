<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Member\Entities\Member;

class CourseMemberMapping extends Model
{
    protected $guarded = [];

    /**
     * This model's relation to user status histories.
     *
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
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
}
