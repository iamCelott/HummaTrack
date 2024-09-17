<?php

namespace App\Http\Controllers\Prefix\Member;

use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    private TeamInterface $team;
    private TeamService $service;
    private UserInterface $user;

    public function __construct(TeamInterface $team, TeamService $service, UserInterface $user)
    {
        $this->team = $team;
        $this->service = $service;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $authId = Auth::user()->id;
        $request->merge(['authId' => $authId]);
        $teams = $this->team->search($request);
        return view('pages.teams.member.index', compact('teams'));
    }

    public function invite(string $unique_code): View
    {
        $team = Team::where('unique_code', $unique_code)->first();
        return view('pages.teams.invite', compact('team'));
    }

    public function team_search_user(Request $request): JsonResponse
    {
        $users = $this->user->team_search_user(request: $request);

        return response()->json([
            'status' => true,
            'data' => $users
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
    public function store(TeamRequest $request)
    {

        $this->team->store($request->all());
        return redirect()->back()->with('success', 'Team Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('pages.teams.show', compact('team'));
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
