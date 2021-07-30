<?php

namespace Database\Factories;

use App\Models\Schools;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schools::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
