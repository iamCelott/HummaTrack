<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\KanbanInterface;
use App\Models\Kanban;
use App\Services\KanbanService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KanbanController extends Controller
{

    private KanbanInterface $kanban;
    private KanbanService $service;

    public function __construct(KanbanInterface $kanban, KanbanService $service)
    {
        $this->kanban = $kanban;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
    public function show(Kanban $kanban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kanban $kanban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kanban $kanban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kanban $kanban)
    {
        //
    }
}
