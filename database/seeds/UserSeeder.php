<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array([
            'nombre'=>'Stephen Melendez',
            'telefono'=>70523519,
            'username'=>'admin',
            'f_nacimiento'=>'2000-07-05',
            'email'=>'stephenvero101@hotmail.com',
            'password'=> Hash::make('123456')
        ]);
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
