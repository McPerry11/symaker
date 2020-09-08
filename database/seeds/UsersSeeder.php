<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->firstName='Roland Joshua';
        $user->middleInitial='R.';
        $user->lastName='Geraldes';
        $user->username='LynerHD';
        $user->college='CCSS';
        $user->email='geraldes.rolandjoshua@ue.edu.ph';
        $user->password='abc123';
        $user->save();
    }
}
