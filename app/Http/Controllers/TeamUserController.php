<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TeamUserInterface;
use App\Models\TeamUser;
use App\Services\TeamUserService;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    private TeamUserInterface $TeamUser;
    private TeamUserService $TeamUserService;

    public function __construct(TeamUserInterface $TeamUser, TeamUserService $TeamUserService)
    {
        $this->TeamUser = $TeamUser;
        $this->TeamUserService = $TeamUserService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamUser $teamUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamUser $teamUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamUser $teamUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamUser $teamUser)
    {
        //
    }
}
