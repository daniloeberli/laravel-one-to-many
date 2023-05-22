<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Project::truncate();

        for($i = 0; $i < 20; $i++) {
            $type = Type::inRandomOrder()->first();
            $project = new Project();
            $project->title = $faker->sentence(4);
            $project->description = $faker->text(200);
            $project->stack = $faker->text(50);
            $project->slug = Str::slug($project->title);
            $project->type_id = $type->id;
            $project->save();
        }
    }
}
