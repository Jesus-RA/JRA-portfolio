<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Project;
use App\Image;
use App\Technology;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function($user){
            $profile = $user->profile()->create();
        });
    }

    public function projects(){
        return $this->hasMany(Project::class, 'owner_id');
    }

    // Relation one to one polymorphic with Image
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function technologies(){
        return $this->morphToMany(Technology::class, 'technologable');
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
}