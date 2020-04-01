<?php

namespace App\Services\NBA;
use App\Repositories\PlayerRepository;

class PlayerServices
{
    protected $player;

    public function __construct(PlayerRepository $player)
    {
        $this->player = $player;
    }

    public function index()
    {
        return $this->player->getPlayers();
    }

    public function store($request)
    {
        return $this->player->storePlayer($request);
    }
}