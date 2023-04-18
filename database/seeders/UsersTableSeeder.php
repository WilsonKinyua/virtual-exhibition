<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Wilson Kinyua',
                'email'              => env('SUPER_ADMIN_EMAIL'),
                'password'           => bcrypt(env('SUPER_ADMIN_PASSWORD')),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-04-18 17:39:12',
                'verification_token' => '',
                'slug'               => '',
                'phone_number'       => '',
                'organization'       => '',
            ],
        ];

        User::insert($users);
    }
}
