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
        $user->firstName = 'Roland Joshua';
        $user->middleInitial = 'R.';
        $user->lastName = 'Geraldes';
        $user->username = 'LynerHD';
        $user->collegeID = 3;
        $user->email = 'geraldes.rolandjoshua@ue.edu.ph';
        $user->password = 'abc123';
        $user->type = 'SYSTEM_ADMIN';
        $user->save();

        $user = new User;
        $user->firstName = 'Mack Perry';
        $user->middleInitial = 'L.';
        $user->lastName = 'Co';
        $user->username = 'McPerry_';
        $user->collegeID = 3;
        $user->email = 'co.mackperry@ue.edu.ph';
        $user->password = 'abc123';
        $user->type = 'SYSTEM_ADMIN';
        $user->save();
    }
}
