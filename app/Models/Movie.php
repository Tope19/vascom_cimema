<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function cinema(){
        return $this->belongsTo(Cinema::class);
    }

    protected $guarded = [];
}
