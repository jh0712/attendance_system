<?php

namespace Modules\Course\Enums\CourseMember;

use Illuminate\Support\Collection;

enum CourseMember: string
{
    case Ori = 'ori';

    case Transfer = 'transfer';

    public static function values(): array
    {
        return Collection::make(self::cases())->map(function ($case) {
            return $case->value;
        })->toArray();
    }

    public static function default(): self
    {
        return self::Ori;
    }

}
