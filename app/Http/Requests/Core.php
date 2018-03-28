<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Core extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}
