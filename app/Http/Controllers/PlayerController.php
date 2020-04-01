<?php

namespace App\Http\Controllers;
use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Request;
use App\Services\NBA\PlayerServices;

class PlayerController extends Controller
{
    protected $player;

    public function __construct(PlayerServices $player)
    {
        $this->player = $player;
    }

    public function index()
    {
        return response()->json($this->player->index());
    }

    public function store(PlayerRequest $request)
    {
        $player = $this->player;

        $player->store($request->all());

        return response()->json(['success' => true, 'message' => 'Player added successfully']);
    }

}
