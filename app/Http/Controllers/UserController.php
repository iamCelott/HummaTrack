<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserInterface $user;
    protected $userRepository;
    private UserService $service;

    public function __construct(UserInterface $user, UserService $service, $userRepository)
    {
        $this->user = $user;
        $this->service = $service;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users =  User::all();
        return view('pages.user.index', compact('users'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $this->user->update($user->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil mengubah user.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->userRepository->delete($id);

        if ($deleted) {
            return redirect()->back()->with('success', 'User berhasil di hapus!');
        } else {
            return redirect()->back()->with('error', 'User masih di gunakan!');
        }
    }
}
