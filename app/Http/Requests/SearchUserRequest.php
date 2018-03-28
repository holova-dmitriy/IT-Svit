<?php

namespace App\Http\Requests;

class SearchUserRequest extends Core
{
    public function rules()
    {
        return [
            'query' => 'nullable|string',
            'status' => 'nullable|boolean'
        ];
    }
}
