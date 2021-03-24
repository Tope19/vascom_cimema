<?php

namespace Modules\Movie\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Novie extends Model
{
    use HasFactory;

    public function cinema(){
        return $this->belongsTo(Cinema::class);
    }

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Movie\Database\factories\NovieFactory::new();
    }
}
