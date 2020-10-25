<?php

use App\User;
use App\Image;
use App\Project;
use App\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $technologies = factory(Technology::class, 10)->create()
            ->each(function ($technology) {
                $technology->icon()->save(factory(App\Image::class)->make());
            });

        $myUser = factory(User::class)->make();
        $myUser->name = 'Jesús Ramírez Alejandro';
        $myUser->email = 'jesus.ra98@hotmail.com';
        $myUser->password = Hash::make('JRAkiritoPK');
        $myUser->save();

        $myUser->projects()
                ->save( factory(Project::class)->create(['owner_id' => $myUser->id]) )
                ->each(function ($project) use ($technologies){
                    $project->technologies()->saveMany($technologies->random(2,8));
                    $project->images()->saveMany( factory(Image::class, mt_rand(3, 5))->make() );
                });

        // $projects = factory(Project::class, 7)
        //     ->make()
        //     ->each(function ($project) use($users, $technologies){
        //         $project->owner_id = $users->random()->id;
        //         $project->save();
                
        //         $project->technologies()->saveMany($technologies->random(mt_rand(2,8)));

        //         $project->images()->saveMany(factory(Image::class, mt_rand(3,5))->make());
        //     });

        // $this->call(UserSeeder::class);
    }
}
