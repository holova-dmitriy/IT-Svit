<?php

namespace App\Models;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Searchable;

    protected $fillable = [
        'email',
        'name',
        'description',
        'status',
    ];
}
