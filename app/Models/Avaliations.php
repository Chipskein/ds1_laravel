<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliations extends Model
{
    use HasFactory;
    protected $table='Avaliations';
    public $timestamps=false;
    protected $fillable = [
        'discipline',
        'student',
        'date',
        'note',
    ];
}
