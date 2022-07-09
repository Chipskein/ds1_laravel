<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teachers as ModelsTeachers;
use Illuminate\Support\Facades\DB;
class Disciplines extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'teacher',
        'name',
        'hours',
    ];
    public function getAll()
    {

        $teachers=DB::table("Disciplines")
        ->leftjoin('Teachers','Teachers.id','=','Disciplines.teacher')
        ->select('Disciplines.*','Teachers.name as TeacherName')
        ->get(); 
        return $teachers;

    }

}
