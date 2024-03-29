<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
    ];
    
    protected $table='Students';
    
    public $timestamps=false;

    public function getAll(){
        $students=DB::table("Students")
        ->leftjoin('Disciplines_Students as ds','Students.id','=','ds.student')
        ->leftjoin('Disciplines','ds.discipline','=','Disciplines.id')
        ->groupBy('Students.id')
        ->select('Students.*',DB::raw("SUM(Disciplines.hours) as ch"),DB::raw("COUNT(Disciplines.id) as DisciplineQt"))
        ->get(); 
        return $students;
    }
    public function calculateStudentsHours($studentId){
        $students=DB::table("Students")
        ->join('Disciplines_Students as ds','Students.id','=','ds.student')
        ->join('Disciplines','ds.discipline','=','Disciplines.id')
        ->groupBy('Students.id')
        ->where('Students.id','=',$studentId)
        ->select('Students.id',DB::raw("SUM(Disciplines.hours) as ch"))
        ->first(); 
        if(!is_null($students)&&!is_null($students->ch)) return $students->ch;
        else return false;
    }
}
