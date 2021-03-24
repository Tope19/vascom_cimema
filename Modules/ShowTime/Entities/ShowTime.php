<?php

namespace Modules\ShowTime\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShowTime extends Model
{
    use HasFactory;

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function cinema(){
        return $this->belongsTo(Cinema::class);
    }

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\ShowTime\Database\factories\ShowTimeFactory::new();
    }
}
