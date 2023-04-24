<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'level'
    ];
}
