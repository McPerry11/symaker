<?php

use Illuminate\Database\Seeder;
use App\College;
use Carbon\Carbon;

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
        $college->abbrev = 'CAS';
        $college->collegeName = 'College of Arts and Sciences';
        $college->colorCode = '#55DD33';
        $college->created_at = Carbon::now('+8:00');
        $college->updated_at = Carbon::now('+8:00');
        $college->save();

        $college = new College();
        $college->abbrev = 'CBA';
        $college->collegeName = 'College of Business Administration';
        $college->colorCode = '#cFc702';
        $college->created_at = Carbon::now('+8:00');
        $college->updated_at = Carbon::now('+8:00');
        $college->save();

        $college = new College();
        $college->abbrev = 'CCSS';
        $college->collegeName = 'College of Computer Studies and Systems';
        $college->colorCode = '#48c774';
        $college->created_at = Carbon::now('+8:00');
        $college->updated_at = Carbon::now('+8:00');
        $college->save();

        $college = new College();
        $college->abbrev = 'CDent';
        $college->collegeName = 'College of Dentistry';
        $college->colorCode = '#DF73FF';
        $college->created_at = Carbon::now('+8:00');
        $college->updated_at = Carbon::now('+8:00');
        $college->save();

        $college = new College();
        $college->abbrev = 'CEng';
        $college->collegeName = 'College of Engineering';
        $college->colorCode = '#FF9F00';
        $college->created_at = Carbon::now('+8:00');
        $college->updated_at = Carbon::now('+8:00');
        $college->save();

        $college = new College();
        $college->abbrev = 'CFA';
        $college->collegeName = 'College of Fine Arts';
        $college->colorCode = '#CD853F';
        $college->created_at = Carbon::now('+8:00');
        $college->updated_at = Carbon::now('+8:00');
        $college->save();

        $college = new College();
        $college->abbrev = 'CEduc';
        $college->collegeName = 'College of Law';
        $college->colorCode = '#DA70D6';
        $college->created_at = Carbon::now('+8:00');
        $college->updated_at = Carbon::now('+8:00');
        $college->save();
    }
}
