<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TeamInterface;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private TeamInterface $team;
    private TeamService $service;

    public function __construct(TeamInterface $team, TeamService $service)
    {
        $this->team = $team;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $teams = $this->team->search($request);
        return view('pages.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
