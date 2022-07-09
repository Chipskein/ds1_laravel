<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teachers as ModelsTeachers;

class Disciplines extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'teacher',
        'name',
        'hours',
    ];
    function __construct() {
        $this->belongsTo(ModelsTeachers::class,'teacher','id','disciplines');
    }

}
