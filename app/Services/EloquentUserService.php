<?php

namespace App\Services;

use App\Models\User;
use App\Interfaces\UserService;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserService implements UserService
{
    public function search(string $query = '', bool $status = true): Collection
    {
        return User::where('status', $status)
            ->where(function ($q) use ($query) {
                $q->where('email', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->get();
    }
}
