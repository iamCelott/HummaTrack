<?php

namespace App\Services;

use App\Models\Kanban;
use App\Traits\StoreImageTrait;

class ProjectService
{
    use StoreImageTrait;
    private $statusMapping = [
        'Belum Dimulai' => 'not_started',
        'Sedang Berlangsung' => 'in_progress',
        'Selesai' => 'completed',
        'Ditunda' => 'on_hold',
    ];

    public function translateStatus($status)
    {
        return $this->statusMapping[$status] ?? null;
    }

    // public function handleImageImage($file, $directory)
    // {
    //     return $this->upload_image($file, $directory);
    // }

    // public function handleUpdateImage($file, $path, $directory)
    // {
    //     return $this->update_image($file, $path, $directory);
    // }

    // public function handleDeleteImage($path)
    // {
    //     return $this->delete_image($path);
    // }

    public function create_kanban($name, $project_id, $description)
    {
        return Kanban::create([
            "name" => $name,
            "project_id" => $project_id,
            "description" => $description,
        ]);
    }

    public function insert_team_projects($data, $project)
    {
        $teamIds = array_map('intval', $data ?? []);

        if (!empty($teamIds)) {
            $project->teams()->sync($teamIds);
        }
    }
}
