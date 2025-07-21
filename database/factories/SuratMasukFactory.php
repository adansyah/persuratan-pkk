<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuratMasuk>
 */
class SuratMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::inRandomOrder()->first()?->id,
            'no_surat' => 'SM-' . $this->faker->unique()->numerify('####'),
            'nama_surat' => $this->faker->sentence(3),
            'tgl_surat' => $this->faker->date(),
            'tgl_diterima' => $this->faker->date(),
            'asal' => $this->faker->company(),
            'perihal' => $this->faker->sentence(4),
            'file' => function () {
                $path = 'surat-masuk/' . $this->faker->unique()->uuid . '.pdf';
                Storage::disk('public')->put($path, 'contoh.pdf');
                return $path;
            },
            'status' => $this->faker->randomElement(['proses', 'diterima', 'dibatalkan']),
        ];
    }
}
