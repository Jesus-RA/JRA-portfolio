<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Image extends Model
{

    protected $fillable = [
        'path',
    ];

    public function imageable(){
        return $this->morphTo();
    }
}
