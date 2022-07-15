<?php

namespace App\Http\Controllers;

use App\Models\Avaliations;
use App\Models\Classes;
use App\Models\Teachers as ModelsTeachers;
use App\Models\Disciplines as ModelsDisciplines;
use App\Models\Disciplines_Students as ModelsDisciplineStudents;
use Illuminate\Http\Request;

class Teachers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=new ModelsTeachers();
        $data=$model->getAll();
        return view('show-teachers',['teachers' => $data ]);
    }

    public function create(Request $request)
    {
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
        ];
        $teacherId=ModelsTeachers::create($data)->id;
        return redirect('/teachers');
    }

    public function delete($id)
    {
        $discipline_id=[];
        $teacherModel=ModelsDisciplines::where('teacher',$id);
        $teachersDisciplines=$teacherModel->get();
        foreach($teachersDisciplines as $discipline){
            array_push($discipline_id,$discipline->id);
        }

        Classes::whereIn('discipline',$discipline_id)->delete();
        Avaliations::whereIn('discipline',$discipline_id)->delete();
        ModelsDisciplineStudents::whereIn('discipline',$discipline_id)->delete();
        $teacherModel->delete();
        ModelsTeachers::where('id',$id)->delete();
        return redirect('/teachers');
    }

    public function edit($id)
    {
        $teacher=ModelsTeachers::where('id',$id)->first();
        return view('edit-teacher',['teacher'=>$teacher]);
    }

    public function update(Request $request, $id)
    {
        $data=[
            'name' => $request->name,
            'email' => $request->email,
        ];
        ModelsTeachers::where('id', $id)->update($data);
        return redirect('/teachers');
    }

}
