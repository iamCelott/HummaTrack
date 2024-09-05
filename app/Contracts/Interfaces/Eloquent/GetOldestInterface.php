<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetOldestInterface
{
    /**
     * Handle get the oldest data by id from models.
     *
     * @param string $id
     * @return mixed
     */

    public function getOldest(string $id): mixed;
}
