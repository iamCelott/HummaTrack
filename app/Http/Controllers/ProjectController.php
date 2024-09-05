<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProjectInterface;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private ProjectInterface $project;

    public function __construct(ProjectInterface $project)
    {
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $projects = $this->project->search($request);
        return view('pages.project', compact('projects'));
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
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
