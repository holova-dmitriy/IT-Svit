<?php

namespace App\Http\Controllers;

use App\Interfaces\UserService;
use App\Http\Resources\UserResource;
use App\Http\Requests\SearchUserRequest;

class SearchController
{
    public function __invoke(SearchUserRequest $request, UserService $userService)
    {
        return UserResource::collection(
            $userService->search(
                $request->get('query') ?? '',
                $request->get('status') ?? 1
            )
        );
    }
}
