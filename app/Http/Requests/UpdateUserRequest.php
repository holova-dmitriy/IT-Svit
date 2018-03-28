<?php

namespace App\Http\Requests;

class UpdateUserRequest extends Core
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'name' => 'string|max:50',
            'description' => 'string|max:3500',
            'status' => 'boolean',
        ];
    }
}
