<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplines_Students extends Model
{
    use HasFactory;
    protected $table='Disciplines_Students';
    protected $fillable = [
        'discipline',
        'student',
        'status',
        'start_date',
        'end_date',
        'final_note',
        'final_freq',
    ];
}
