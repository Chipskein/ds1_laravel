<?php

namespace App\Models;

use DateTime;
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
        ->leftjoin('Students','Students.id','=','student')
        ->select('Disciplines_Students.*','Teachers.name as TeacherName','Disciplines.name as DisciplineName','Students.name as StudentName')
        ->get(); 
        return $disciplineStudents;
    }
    public function getAllById($id, $student)
    {
        $disciplineStudents=DB::table("Disciplines_Students")
        ->leftjoin('Disciplines','Disciplines.id','=','Disciplines_Students.discipline')
        ->leftjoin('Students','Students.id','=','student')
        ->where('Disciplines_Students.discipline',$id)
        ->where('Disciplines_Students.student',$student)
        ->select('Disciplines_Students.*','Disciplines.name as DisciplineName','Students.name as StudentName')
        ->get(); 
        return $disciplineStudents;
    }
    public function getById($id, $student)
    {
        $disciplineStudents=DB::table("Disciplines_Students")
        ->leftjoin('Disciplines','Disciplines.id','=','Disciplines_Students.discipline')
        ->leftjoin('Students','Students.id','=','student')
        ->where('Disciplines_Students.discipline',$id)
        ->where('Disciplines_Students.student',$student)
        ->select('Disciplines_Students.*','Disciplines.name as DisciplineName','Students.name as StudentName')
        ->first(); 
        return $disciplineStudents;
    }
    public function getTeacher($name)
    {
        $disciplineStudents=DB::table("Disciplines_Students")
        ->leftjoin('Disciplines','Disciplines.id','=','Disciplines_Students.discipline')
        ->leftjoin('Teachers','Teachers.id','=','Disciplines.teacher')
        ->leftjoin('Students','Students.id','=','student')
        ->where('Teachers.name',$name)
        ->select('Disciplines_Students.*','Teachers.name as TeacherName','Disciplines.name as DisciplineName','Students.name as StudentName')
        ->get(); 
        return $disciplineStudents;
    }
    public function getStudent($name)
    {
        $disciplineStudents=DB::table("Disciplines_Students")
        ->leftjoin('Disciplines','Disciplines.id','=','Disciplines_Students.discipline')
        ->leftjoin('Teachers','Teachers.id','=','Disciplines.teacher')
        ->leftjoin('Students','Students.id','=','student')
        ->where('Students.name',$name)
        ->select('Disciplines_Students.*','Teachers.name as TeacherName','Disciplines.name as DisciplineName','Students.name as StudentName')
        ->get(); 
        return $disciplineStudents;
    }
    public function MatriculateToDiscipline($discipline_ids,$id)
    {
        $data=[];
        $year = date('Y') - 1; // Get current year and subtract 1
        $start = mktime(0, 0, 0, 1, 1, $year);
        $end = mktime(0, 0, 0, 12, 31, $year);
        $currentTime = DateTime::createFromFormat( 'U',$start);
        $start_date = $currentTime->format( 'c' );
        $currentTime = DateTime::createFromFormat( 'U',$end);
        $end_date = $currentTime->format( 'c' );
        foreach ($discipline_ids as $disciplineId){
            $row=[
                'discipline'=>$disciplineId,
                'student'=>$id,
                'start_date'=>$start_date,
                'end_date'=>$end_date
            ];
            array_push($data,$row);
        }
        DB::table('Disciplines_Students')->upsert($data,['start_date', 'end_date']);
    }
    public function sumofHoursByDisciplines($discipline_ids){
        $query=DB::table('Disciplines')
        ->whereIn('Disciplines.id',$discipline_ids)
        ->select(DB::raw("SUM(Disciplines.hours) as ch"))
        ->first();
        ;
        if(!is_null($query)&&!is_null($query->ch)) return $query->ch;
        else return false;

    }
}
