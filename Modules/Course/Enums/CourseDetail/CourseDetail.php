<?php

namespace Modules\Course\Enums\CourseDetail;

use Illuminate\Support\Collection;

enum CourseDetail: string
{
    case Base = 'base';

    case Extra = 'extra';

    public static function values(): array
    {
        return Collection::make(self::cases())->map(function ($case) {
            return $case->value;
        })->toArray();
    }

    public static function default(): self
    {
        return self::Base;
    }
}
