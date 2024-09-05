<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetWhereInterface
{
    /**
     * Handle get data event from models.
     *
     * @param array $data
     * 
     * @return mixed
     */

    public function getWhere(array $data): mixed;
}
