<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->paginate(10);
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan.',
            'data' => $teams,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        try {
            $data = Team::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan.',
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan',
                'data' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Team::find($id);

        if(!$data){
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
    public function update(TeamRequest $request, string $id)
    {
        try {

            $teams = Team::find($id);
            $data = $teams->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah.',
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal diubah',
                'data' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teams = Team::find($id);

        if (!$teams) {
            return response()->json([
                'status' => false,
                'message' => 'Data yang ingin dihapus tidak ditemukan.',
            ], 404);
        }

        $teams->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus.',
        ]);
    }
}
