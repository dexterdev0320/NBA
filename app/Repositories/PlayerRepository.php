<?php

namespace App\Repositories;
use App\Player;

class PlayerRepository
{
    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function getPlayers()
    {
        return $this->player->with('team')->latest()->get();
    }

    public function storePlayer($request)
    {
        return $this->player->create($request);
    }
}