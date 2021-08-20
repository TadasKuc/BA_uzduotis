<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS_ACTIVE = "Active";
    public const STATUS_INACTIVE = "Inactive";

    public const STATUS = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE
    ];
}
