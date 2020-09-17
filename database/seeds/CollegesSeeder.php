<?php

use Illuminate\Database\Seeder;
use App\College;

class CollegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $college = new College();
        $college -> abbrev='CCSS';
        $college -> collegeName='College of Computer Science and Systems';
        $college -> colorCode='#27a80d';
        $college->save();
    }
}
