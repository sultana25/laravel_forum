<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'admin',
            'password'=>bcrypt('admin'),
            'email'=>'admin@forum.dev',
            'admin'=>1,
            'avatar'=>asset('avatars/pic.jpg'),
        ]);
        app\User::create([
           'name'=>'ornab',
            'password'=>bcrypt('ornab'),
            'email'=>'hzamil@gmail.com',
            'avatar'=>asset('avatars/abbu.jpg'),
        ]);
    }
}
