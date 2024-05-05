<?php
use Modules\Course\Repositories\CourseRepository;
use Modules\Course\Contracts\CourseContract;
use Modules\Course\Contracts\CourseDetailContract;
use Modules\Course\Repositories\CourseDetailRepository;
use Modules\Course\Contracts\CourseMemberMappingContract;
use Modules\Course\Repositories\CourseMemberMappingRepository;

return [
    'name' => 'Course',
    'bindings' => [
        CourseContract::class => CourseRepository::class,
        CourseDetailContract::class => CourseDetailRepository::class,
        CourseMemberMappingContract::class => CourseMemberMappingRepository::class,
    ]
];
