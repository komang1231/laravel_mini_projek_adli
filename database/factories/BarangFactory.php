<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => $this->faker->word(),
            'deskripsi'   => $this->faker->sentence(),
            'harga'       => $this->faker->randomFloat(2, 1, 1000),
            'stok'        => $this->faker->numberBetween(1, 100),
            'kategori_id' => \App\Models\Kategori::factory(),
        ];
    }
}
