<?php

namespace App\Services\NBA;
use App\Repositories\TeamRepository;

class TeamServices
{
    protected $team;

    public function __construct(TeamRepository $team)
    {
        $this->team = $team;
    }

    public function index()
    {
        return $this->team->getTeams();
    }

    public function store($request)
    {
        return $this->team->storeTeams($request);
    }
}