<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = [];

    public function sale(){
        return $this->belongsTo(Sales::class);
    }
}
