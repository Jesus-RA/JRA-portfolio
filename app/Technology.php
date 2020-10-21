<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Technology extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $with = [
        'icon',
    ];

    public function projects(){
        return $this->morphedByMany(Project::class, 'technologable');
    }

    public function users(){
        return $this->morphedByMany(User::class, 'technologable');
    }

    public function icon(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function technologable(){
        return $this->morphTo();
    }
}