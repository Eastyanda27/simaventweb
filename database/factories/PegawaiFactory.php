<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $userIndex = 0;
        $userData =  [
            [
                'id_user' => 'ABCDEFGHIJKLMNOP',
                'email' => 'eastyandaputra@gmail.com',
                'employee_name' => 'Eastyanda',
                'nip' => $this->faker->numerify('1111111111'), // Format NIP acak
            ],
            [
                'id_user' => 'PONMLKJIHGFEDCBA',
                'email' => 'eastyanda27@gmail.com',
                'employee_name' => 'Delvit',
                'nip' => $this->faker->numerify('222222222'), 
            ],
            [
                'id_user' => 'FLAWEKTSMFBGJAWA',
                'email' => 'bujangkincai@gmail.com',
                'employee_name' => 'Bambang',
                'nip' => $this->faker->numerify('333333333'),
            ],
            [
                'id_user' => 'KJSFALKELASWTUSN',
                'email' => 'suryanidepi0@gmail.com',
                'employee_name' => 'Depi',
                'nip' => $this->faker->numerify('444444444'),
            ],
        ];
        return $userData[$userIndex++ % count($userData)];
    }
}
