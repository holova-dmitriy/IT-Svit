<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface UserService
{
    public function search(string $query = '', bool $status = true): Collection;
}
