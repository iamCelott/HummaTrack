<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\KanbanInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Models\Kanban;
use App\Services\KanbanService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KanbanController extends Controller
{

    private KanbanInterface $kanban;
    private KanbanService $service;
    private UserInterface $user;

    public function __construct(KanbanInterface $kanban, KanbanService $service, UserInterface $user)
    {
        $this->kanban = $kanban;
        $this->service = $service;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $kanbans = $this->kanban->get();
        return view('pages.kanban.index');
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
        $users = $this->user->get();
        return view('pages.kanban.index', compact('kanban', 'users'));
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
