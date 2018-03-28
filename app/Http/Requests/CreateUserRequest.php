<?php

namespace App\Http\Requests;

class CreateUserRequest extends Core
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'name' => 'string|max:50',
            'description' => 'string|max:3500',
        ];
    }
}
