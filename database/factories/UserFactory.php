<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected $model = User::class;

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
                'password' => Hash::make('12345678'), // Password default
                'access' => 'Admin',
            ],
            [
                'id_user' => 'PONMLKJIHGFEDCBA',
                'email' => 'eastyanda27@gmail.com',
                'employee_name' => 'Delvit',
                'nip' => $this->faker->numerify('222222222'), // Format NIP acak
                'password' => Hash::make('12345678'), // Password default
                'access' => 'Staf Pegawai'
            ],
            [
                'id_user' => 'FLAWEKTSMFBGJAWA',
                'email' => 'bujangkincai@gmail.com',
                'employee_name' => 'Bambang',
                'nip' => $this->faker->numerify('333333333'), // Format NIP acak
                'password' => Hash::make('12345678'), // Password default
                'access' => 'Kepala Bidang'
            ],
            [
                'id_user' => 'KJSFALKELASWTUSN',
                'email' => 'suryanidepi0@gmail.com',
                'employee_name' => 'Depi',
                'nip' => $this->faker->numerify('444444444'), // Format NIP acak
                'password' => Hash::make('12345678'), // Password default
                'access' => 'Kepala Dinas'
            ],
        ];

        return $userData[$userIndex++ % count($userData)];
    }
}
