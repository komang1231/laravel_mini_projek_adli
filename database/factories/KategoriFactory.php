<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(int $count = 10): array
    {
        return [
            'kode_kategori' => 'KAT' . strtoupper(\Illuminate\Support\Str::random(3)) . rand(100, 999),
            'nama_kategori' => $this->faker->word(),
            
        ];
    }
}
