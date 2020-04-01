<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = [];

    public function getPlayers(){
        return $this->with('team')->latest()->get();
    }

    public function storePlayers($request){
        return $this->create($request);
    }

    public function team(){
        return $this->belongsTo('App\Team');
    }
}
