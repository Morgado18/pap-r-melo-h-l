<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
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
                'Grãos e Cereais',
                'Frutas',
                'Hortaliças e Vegetais',
                'Leguminosas',
                'Raízes e Tubérculos',
                'Ervas e Temperos',
                'Flores e Plantas Ornamentais',
                'Produtos de Origem Animal ',
                'Sementes e Mudas',
                'Insumos Agrícolas',
                'Outro',
            ])
        ];
    }
}
