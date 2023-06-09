<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Akun>
 */
class AkunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_admin' => $this->faker->boolean(),
            'is_verified' => $this->faker->boolean(),
            'dibuat_pada' => $this->faker->dateTime(),
            'nama_belakang' => $this->faker->lastName(),
            'nama_depan' => $this->faker->firstName(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'nip' => $this->faker->unique()->regexify('[0-9]{10, 18}'),
            'jabatan' => array_rand(["mahasiswa", "tendik", "others"]),
            'foto_tanda_pengenal' => $this->faker->imageUrl()
        ];
    }
}
