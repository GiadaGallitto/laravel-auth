<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for($i=0; $i < 15 ; $i++){
            $new_project = new Project();
            $new_project->title = $faker->title();
            $new_project->argument = $faker->text($maxNbChars = 50);
            $new_project->description = $faker->text();
            $new_project->author = $faker->name();
            $new_project->start_date = $faker->dateTime();
            $new_project->concluded = $faker->boolean();
            $new_project->save();
        }
    }
}
