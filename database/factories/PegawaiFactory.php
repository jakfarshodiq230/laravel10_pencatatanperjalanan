<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->randomNumber(),
            'nama' => $this->faker->name(),
            'foto' => $this->faker->randomDigit(),
            'nik' => $this->faker->randomNumber(),
            'scan_kk' => $this->faker->randomDigit(),
            'scan_ktp' => $this->faker->randomDigit(50),
            'foto' => $this->faker->randomDigit(),
            'tempat_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomKey(['Laki - Laki' => 1, 'Perempuan' => 2]),
            'golongan_darah' => $this->faker->randomKey(['A' => 0, 'B' => 1, 'AB' => 2, 'O' => 3]),
            'alamat' => $this->faker->address(),
            'agama' => $this->faker->randomKey(['Islam' => 0, 'Kristen Protestan' => 1, 'Kristen Katholik' => 2, 'Hindu' => 3, 'Budha' => 4]),
            'status_perkawinan' => $this->faker->randomKey(['Sudah Kawin' => 1, 'Belum Kawin' => 2]),
            'pekerjaan' => $this->faker->jobTitle(),
            'no_hp' => $this->faker->randomNumber(),
            'kewarganegaraan' => $this->faker->randomKey(['WNI' => 1, 'WNA' => 2])
        ];
    }
}
