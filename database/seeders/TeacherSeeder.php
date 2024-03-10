<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * The current password being used by the seeder.
     */
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('eduseedaccount'),

        ])->assignRole('teacher');

        Teacher::create([
            'user_id'           => '2',
            'gender'            => 'male',
            'phone'             => '1111111111',
            'dateofbirth'       => '2000-01-01',
            'current_address'   => 'kabwe',
            'permanent_address' => 'kabwe',
            'created_at'        => now(),
        ]);

    }
}
