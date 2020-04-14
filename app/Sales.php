<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $guarded = [];

    public function sale(){
        return $this->belongsTo(User::class);
    }

    public function chat(){
        return $this->hasMany(Chat::class);
    }

    public function ownerUser(){
        return User::find($this->user_id);
    }

}
