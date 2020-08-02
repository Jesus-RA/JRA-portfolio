<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Image extends Model
{

    protected $fillable = [
        'path'
    ];

    // Relation one to many with Project
    // public function project(){
    //     return $this->belongsTo(Project::class);
    // }

    public function imageable(){
        return $this->morphTo();
    }
}
