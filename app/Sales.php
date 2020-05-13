<?php

namespace App;

use Carbon\Carbon;
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

    public function idToUsername(){
        if (!is_null($this->buyer_id)){
            $qcondition = ['id' => $this->buyer_id];
            $user = User::where($qcondition)->get();

            $saved = new Carbon($this->endOfAuction);
            if (($saved->gt(now()))){
                return " ";
            }
            return "Winner: " . $user[0]->username;
        }
        return " ";
    }

}
