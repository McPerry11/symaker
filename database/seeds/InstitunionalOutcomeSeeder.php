<?php

use Illuminate\Database\Seeder;

class InstitunionalOutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = new \App\institutionalOutcome();
        $content->content = "attuned to the constantly changing needs and challenges of the youth within the context of a proud nation, its enriched culture in the global community;";
        $content->type = "University";
        $content->save();

        $content = new \App\institutionalOutcome();
        $content->content = "able to produce new knowledge gleaned from innovative research – the hallmark of an institution’s integrity and dynamism; and";
        $content->type = "University";
        $content->save();

        $content = new \App\institutionalOutcome();
        $content->content = "capable of rendering relevant and committed service to the community, the nation, and the world.";
        $content->type = "University";
        $content->save();
    }
}
