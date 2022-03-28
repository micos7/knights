<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Knight;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Knight>
 */
class KnightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $knight = new Knight();
        $age = random_int(20, 25);
        return [
    
            'name' => $knight->getFakeName(),
            'age' => $age,
            'health' => 100,
            'courage' => min(random_int(0, 100) + $age-20,100),
            'justice' => min(random_int(0, 100) + $age-20,100),
            'mercy' => min(random_int(0, 100) + 25-$age,100),
            'generosity' => min(random_int(0, 100) + 25-$age,100),
            'faith' => min(random_int(0, 100) + $age-20,100),
            'nobility' => random_int(0, 100),
            'hope' => min(random_int(0, 100) + 25-$age,100),
            'strength' => min(random_int(60, 100) + $age-20,100),
            'defence' => min(random_int(20, 60) + 25-$age,60),
            'battle' => random_int(20, 40),
            'picture' => $knight->getFakePic(),
            'virtues' => 0,
        ];
    }
}
