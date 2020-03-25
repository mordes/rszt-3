<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $guarded = [];

    public function sale(){
        return $this->belongsTo(User::class);
    }
}
