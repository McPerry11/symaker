<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(CollegesSeeder::class);
    	$this->call(UsersSeeder::class);
    	$this->call(otherContentSeeder::class);
    	$this->call(GuidingPrincipleSeeder::class);
    	$this->call(InstitunionalOutcomeSeeder::class);
    }
  }
