<?php
use Modules\Course\Repositories\CourseRepository;
use Modules\Course\Contracts\CourseContract;

return [
    'name' => 'Course',
    'bindings' => [
        CourseContract::class => CourseRepository::class
    ]
];
