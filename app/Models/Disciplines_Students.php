<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Disciplines_Students extends Model
{
    use HasFactory;
    protected $table='Disciplines_Students';
    public $timestamps=false;
    protected $fillable = [
        'discipline',
        'student',
        'status',
        'start_date',
        'end_date',
        'final_note',
        'final_freq',
    ];

    public function getAll()
    {
        $disciplineStudents=DB::table("Disciplines_Students")
        ->leftjoin('Disciplines','Disciplines.id','=','Disciplines_Students.discipline')
        ->leftjoin('Teachers','Teachers.id','=','Disciplines.teacher')
        ->select('*')
        ->get(); 
        return $disciplineStudents;
    }
    public function getAllById($id)
    {
        $disciplineStudents=DB::table("Disciplines_Students")
        ->leftjoin('Disciplines','Disciplines.id','=','Disciplines_Students.discipline')
        ->leftjoin('Teachers','Teachers.id','=','Disciplines.teacher')
        ->where('Disciplines_Students.student',$id)
        ->select('*')
        ->get(); 
        return $disciplineStudents;
    }
}
