<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\RecentProjectInterface;
use App\Models\RecentProject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecentProjectController extends Controller
{

    private RecentProjectInterface $project;

    public function __construct(RecentProjectInterface $project)
    {
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $request->merge(['user_id' => $request->id]);
        $recent_projects = $this->project->search($request);
        return response()->json([
            'status' => true,
            'data' => $recent_projects,
        ]);
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
    public function show(RecentProject $recentProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecentProject $recentProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecentProject $recentProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecentProject $recentProject)
    {
        //
    }
}
