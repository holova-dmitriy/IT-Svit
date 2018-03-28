<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(CreateUserRequest $request)
    {
        return (new UserResource(
            User::create([
                'email' => $request->get('email'),
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ])
        ))
            ->response()
            ->setStatusCode(201);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'status' => $request->has('status'),
        ]);

        return (new UserResource($user))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()
            ->json([
                'message' => 'OK',
            ])
            ->setStatusCode(204);
    }
}
