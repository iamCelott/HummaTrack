<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TeamProjectInterface;
use App\Models\TeamProject;
use App\Services\TeamProjectService;
use Illuminate\Http\Request;

class TeamProjectController extends Controller
{
    private TeamProjectInterface $TeamProject;
    private TeamProjectService $TeamProjectService;

    public function __construct(TeamProjectInterface $TeamProject, TeamProjectService $TeamProjectService)
    {
        $this->TeamProject = $TeamProject;
        $this->TeamProjectService = $TeamProjectService;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamProject $teamProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamProject $teamProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamProject $teamProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamProject $teamProject)
    {
        //
    }
}
