<?php

namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Http\Request;

interface SearchInterface
{
    /**
     * Handle count all data event from models.
     *
     *
     * @return mixed
     */

    public function search(Request $request): mixed;
}
