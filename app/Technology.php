<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Technology extends Model
{
    protected $fillable = [
        'name',
    ];

    public function projects(){
        return $this->morphedByMany(Project::class, 'technologable');
    }

    public function users(){
        return $this->morphedByMany(User::class, 'technologable');
    }
}
