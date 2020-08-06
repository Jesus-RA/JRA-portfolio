<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\Project;
use App\Technology;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $technologies = factory(Technology::class, 10)->create();        

        $users = factory(User::class, 10)
            ->create()
            ->each(function ($user) use($technologies){
                $user->technologies()->saveMany($technologies->random(mt_rand(2,8)));

                $user->image()->save(factory(Image::class)->make());
            });

        $projects = factory(Project::class, 30)
            ->make()
            ->each(function ($project) use($users, $technologies){
                $project->owner_id = $users->random()->id;
                $project->save();
                
                $project->technologies()->saveMany($technologies->random(mt_rand(2,8)));

                $project->images()->saveMany(factory(Image::class, mt_rand(3,5))->make());
            });

        // $this->call(UserSeeder::class);
    }
}
