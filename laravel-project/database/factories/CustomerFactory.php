<?php

namespace Database\Factories;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {  
        
        return [
            'name' => $this->faker->name(),
            'mobile'=> $this->faker->phoneNumber(),
            'gender' => 'male',
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
