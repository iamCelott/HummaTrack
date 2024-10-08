<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Contracts\Interfaces\DepartmentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Contracts\View\View;

class DepartmentController extends Controller
{

    private DepartmentInterface $department;
    private DepartmentService $service;

    public function __construct(DepartmentInterface $department, DepartmentService $service)
    {
        $this->department = $department;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $departments = $this->department->search($request);
        return view('pages.department.index', compact('departments'));
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
    public function store(DepartmentRequest  $request)
    {
        $this->department->store([
            'name' => ucwords($request->name),
        ]);
        return redirect()->route('admin.department.index')->with('success', 'Berhasil menambah kategori tugas baru.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $this->department->update($department->id, $request->validated());
        return redirect()->route('admin.department.index')->with('success', 'Berhasil mengupdate kategori tugas baru.');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            $this->department->delete($department->id);
            return back()->with('success', 'Berhasil menghapus kategori tugas.');
        } catch (\Exception $e) {
            return back()->with("error", 'Kateogori ini tidak dapat dihapus karena masih terpakai');
        }
    }
}
