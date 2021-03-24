<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function cinema(){
        return $this->belongsTo(Cinema::class);
    }

    protected $guarded = [];
}
