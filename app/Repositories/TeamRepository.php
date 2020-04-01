<?php

namespace App\Repositories;
use App\Team;

class TeamRepository
{
    protected $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function getTeams()
    {
        return $this->team->latest()->get();
    }

    public function storeTeams($request)
    {
        return $this->team->create($request);
    }
}