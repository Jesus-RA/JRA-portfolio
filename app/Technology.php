<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Technology extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
