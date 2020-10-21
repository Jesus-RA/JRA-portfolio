<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function technologies(){
        return $this->morphToMany(Technology::class, 'technologable');
    }
}