<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Kh\Contracts\Stateable;
use Modules\Kh\Traits\HistoryRelation;

class Course extends Model
{
    protected $guarded = [
    ];

    /**
     * This model's relation to user status histories.
     *
     * @return HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(CourseMemberMapping::class, 'course_id');
    }

    public function courseDetails(): HasMany
    {
        return $this->hasMany(CourseDetail::class, 'course_id');
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
