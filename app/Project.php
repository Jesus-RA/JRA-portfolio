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

    // Relation one to many with Image
    // public function images(){
    //     return $this->hasMany(Image::class);
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relation one to many polymorphic with Image
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
