<?php

namespace App\Http\Controllers\Api;

use App\Enums\ProjectStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan.',
            'data' => $projects,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {

        try {
            $request->validated();

            // $imagePath = $request->image->store('project_images', 'public');

            $data = Project::create([
                // 'image' => $imagePath,
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'type' => $request->type,
                'description' => $request->description,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan.',
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan.',
                'data' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Project::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan.',
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan.',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        try {
            $request->validated();

            // $imagePath = $request->image->store('project_images', 'public');

            $project = Project::find($id);

            $data = $project->update([
                // 'image' => "",
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'type' => $request->type,
                'description' => $request->description,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah.',
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal diubah.',
                'data' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json([
                'status' => false,
                'message' => 'Data yang ingin dihapus tidak ditemukan.',
            ], 404);
        }

        $project->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus.',
        ]);
    }
}
