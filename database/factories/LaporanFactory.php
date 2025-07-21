<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenis = $this->faker->randomElement(['masuk', 'keluar']);

        return [
            'user_id' => User::inRandomOrder()->first()?->id,
            'jenis_surat' => $jenis,
            'tgl_surat_masuk' => $jenis === 'masuk' ? $this->faker->date() : null,
            'tgl_surat_keluar' => $jenis === 'keluar' ? $this->faker->date() : null,
            'keterangan' => $this->faker->optional()->sentence(5),
            'file' => $this->faker->optional()->word() . '.pdf',
        ];
    }
}
