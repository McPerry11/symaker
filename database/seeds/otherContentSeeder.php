<?php

use Illuminate\Database\Seeder;
use App\OtherContent;

class otherContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = new \App\OtherContent();
        $content->title = 'MissionStatement';
        $content->content = 'Imploring the aid of Divine Providence, the University of the East dedicates itself to the service of youth, country, and God, and declares adherence to academic freedom, progressive instruction, creative scholarship, goodwill among nations, and constructive educational leadership. Inspired and sustained by a deep sense of dedication and a compelling yearning for relevance, the University of the East hereby declares as its goal and addresses itself to the development of a just, progressive, and humane society.';
        $content->type = 'University';
        $content->save();

        $content = new OtherContent();
        $content->title = 'VisionStatement';
        $content->content = 'As a private non-sectarian institution of higher learning, the University of the East commits itself to producing, through relevant and affordable quality education, morally upright and competent leaders in various professions, imbued with a strong sense of service to their fellowmen and their country.';
        $content->type = 'University';
        $content->save();

        $content = new OtherContent();
        $content->title = 'CoreValues';
        $content->content='As a private non-sectarian institution of higher learning, the University of the East commits itself to producing, through relevant and affordable quality education, morally upright and competent leaders in various professions, imbued with a strong sense of service to their fellowmen and their country.';
        $content->type = 'University';
        $content->save();


    }
}
