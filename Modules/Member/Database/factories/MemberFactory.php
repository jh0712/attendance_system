<?php

namespace Modules\Member\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Member\Entities\Member;
class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber
        ];
    }
}

