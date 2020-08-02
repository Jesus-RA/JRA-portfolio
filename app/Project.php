<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Technology;
use App\Image;
use App\User;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'repository',
        'url',
        'owner_id'
    ];

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
