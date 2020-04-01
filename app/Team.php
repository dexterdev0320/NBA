<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function getTeams(){
        return $this->latest()->get();
    }

    public function storeTeams($request){
        return $this->create($request);
    }

    public function players(){
        return $this->hasMany('App\Player');
    }
}
