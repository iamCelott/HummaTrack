<?php

namespace App\Services;

class ProjectService
{
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
}
