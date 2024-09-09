<?php

namespace App\Services;

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

    public function handleImageUpload($file)
    {
        return $this->upload_image($file, 'project_images');
    }
}
