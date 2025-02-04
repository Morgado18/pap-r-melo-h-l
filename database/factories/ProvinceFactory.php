<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Province>
 */
class ProvinceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => $this->faker->unique()->randomElement([
                'Bengo',
                'Benguela',
                'Bié',
                'Cabinda',
                'Cunene',
                'Huambo',
                'Huíla',
                'Cuando ',
                'Cubango',
                'Kwanza Norte',
                'Kwanza Sul',
                'Luanda',
                'Lunda Norte',
                'Lunda Sul',
                'Malange',
                'Moxico',
                'Namibe',
                'Uíge',
                'Zaire',
                'Moxico Leste',
                'Icolo e Bengo',
            ])
        ];
    }
}
