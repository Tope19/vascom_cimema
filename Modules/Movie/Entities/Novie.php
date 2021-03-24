<?php

namespace Modules\Movie\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Movie\Entities\Cinema;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Novie extends Model
{
    use HasFactory;

    public function cinema(){
        return $this->belongsTo(Cinema::class, 'cinema_id');
    }

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Movie\Database\factories\NovieFactory::new();
    }
}
