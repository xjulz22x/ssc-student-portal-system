<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = User::create([
            'first_name' => 'admin',
            'middle_name' => 'admin',
            'last_name' => 'admin',
            'student_id' => '123123',
            'course' => 'bsit',
            'email' => 'admin@example.com',
            'password'=> Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $student = User::create([
            'first_name' => 'test',
            'middle_name' => 'test',
            'last_name' => 'test',
            'student_id' => '123123',
            'course' => 'bsit',
            'email' => 'test@example.com',
            'password'=> Hash::make('test'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $adminRole = Role::findByName('ssc-staff')->users()->attach($staff);
        $adminRole = Role::findByName('student')->users()->attach($student);


    }
}
