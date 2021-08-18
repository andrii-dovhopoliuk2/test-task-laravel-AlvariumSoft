<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'birthday' => $this->faker->date(),
            'position' => $this->faker->text(15),
            'department_id' => Department::inRandomOrder()->first()->id,
            'type' => array_rand(Employe::getTypesPayment()),
            'monthly_payment' => $this->faker->numberBetween(1, 9999),
        ];
    }

}
