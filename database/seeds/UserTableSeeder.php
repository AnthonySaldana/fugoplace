// app/database/seeds/UserTableSeeder.php

<?php
use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Admin',
        'email'    => 'anthonywebsol@gmail.com',
        'password' => Hash::make('Cart3r3721!*'),
        'school_name' => 'Admin School',
    ));
}

}