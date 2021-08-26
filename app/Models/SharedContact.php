<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedContact extends Model
{
    use HasFactory;

    private mixed $user_to_id;
}
