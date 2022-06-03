<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplines_Teachers extends Model
{
    use HasFactory;
    protected $fillable = [
        'discipline',
        'teacher',
    ];
}
