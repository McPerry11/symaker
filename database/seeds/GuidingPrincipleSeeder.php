<?php

use Illuminate\Database\Seeder;
use \App\guidingPrinciple;

class GuidingPrincipleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = new guidingPrinciple();
        $content->content = "Dedication forever to the service of youth, country, and God; training the youth to become good and competent citizens; promoting a deep and abiding loyalty to the Motherland and her own way of life; and serving the will of the Creator;";
        $content->type = "University";
        $content->save();

        $content = new guidingPrinciple();
        $content->content = "Active encouragement of academic freedom, the only road to the realm of wisdom and truth;";
        $content->type = "University";
        $content->save();

        $content = new guidingPrinciple();
        $content->content = "Constant attunement of curricula to the changing needs of individuals and nations in civilizations and cultures ceaselessly being enriched by technology, science, and scholarship;";
        $content->type = "University";
        $content->save();

        $content = new guidingPrinciple();
        $content->content = "Encouragement to the utmost of scholarship and research towards the broadening of knowledge to new horizons and the augmenting of mankind's harvest of freedom, contentment, and abundance;";
        $content->type = "University";
        $content->save();

        $content = new guidingPrinciple();
        $content->content = "Promotion, through the bonds of culture, of international amity and goodwill as basis for the enduring world peace long dreamed of by men; and";
        $content->type = "University";
        $content->save();

        $content = new guidingPrinciple();
        $content->content = "Uttermost endeavor to attain and keep a position at the vanguard of higher education so that, as a beacon light to all the Orient, it may attract to its campuses promising youth from many lands in search of wisdom and truth.";
        $content->type = "University";
        $content->save();
    }
}
