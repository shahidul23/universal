<?php

namespace Database\Factories;

use App\Models\Consultant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ConsultantFactory extends Factory
{
    protected $model = Consultant::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(),
            'department' => $this->faker->text(),
            'designation' => $this->faker->text(),
            'degree' => $this->faker->text(),
            'chamber_time' => $this->faker->text(),
            'chamber_schedule' => $this->faker->text(),
            'fee' => $this->faker->text(),
        ];
    }
}



