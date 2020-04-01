<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;
use App\Services\NBA\TeamServices;

class TeamController extends Controller
{
    protected $team;

    public function __construct(TeamServices $team)
    {
        $this->team = $team;
    }

    public function index()
    {
        $team = $this->team;

        $teams = $team->index();

        return response()->json($teams);
    }

    public function store(TeamRequest $request)
    {
        $team = $this->team;

        $team->store($request->all());
        
        return response()->json(['success' => true, 'message' => 'Team added successfully']);
        
    }
}
