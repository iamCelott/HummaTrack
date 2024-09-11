<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\KanbanInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private ProjectInterface $project;
    private ProjectService $service;
    private KanbanInterface $kanban;

    public function __construct(ProjectInterface $project, ProjectService $service, KanbanInterface $kanban)
    {
        $this->project = $project;
        $this->kanban = $kanban;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $projects = $this->project->search($request);
        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request, Project $project)
    {
        $this->project->store($request->validated());
        return redirect()->route('projects.index')->with('success', 'Berhasil menambah proyek baru.');
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
    public function update(ProjectRequest $request, Project $project)
    {
        $this->project->update($project->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil mengubah proyek.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->project->delete($project->id);
        return redirect()->back()->with('success', 'Berhasil menghapus proyek.');
    }
}
