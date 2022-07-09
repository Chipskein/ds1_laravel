<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Disciplines as ModelsDisciplines;
class Teachers extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
    ];
    public $table='Teachers';
    public $timestamps=false;
    
    public function getAll()
    {
        
        $teachers=DB::table("Teachers")
            ->leftjoin('Disciplines','Teachers.id','=','Disciplines.teacher')
            ->groupBy('Teachers.id')
            ->select('Teachers.*',DB::raw('SUM(Disciplines.hours) as ch'),DB::raw('COUNT(Disciplines.id) as DisciplineQt'))
            ->get()
        ; 
        return $teachers;
    }
}
