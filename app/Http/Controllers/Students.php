<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students as ModelsStudents;
use App\Models\Disciplines as ModelsDisciplines;
use App\Models\Avaliations as ModelsAvaliations;
use App\Models\Disciplines_Students as Disciplines_Students;
use App\Models\Classes;
class Students extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=new ModelsStudents();
        $students=$model->getAll();
        return view('show-students',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
        ];
        $student=ModelsStudents::create($data)->id;
        return redirect("/students/edit/$student");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=ModelsStudents::where('id',$id)->first();
        $model=new ModelsDisciplines();
        $disciplines=$model->getAll();
        $matriculatedId=[];
        $tmp=Disciplines_Students::where('student',$id)->get();
        foreach ($tmp as $discipline){
            array_push($matriculatedId,$discipline->discipline);
        }
        return view('edit-student',['disciplines'=>$disciplines,'matriculatedId'=>$matriculatedId,'student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $MAX_HOURS_STUDENT=50;
        $olddiscipline_ids=[];
        $tmp=Disciplines_Students::where('student',$id)->get();
        foreach ($tmp as $discipline){ 
            array_push($olddiscipline_ids,$discipline->discipline);
        }
        
        $modelStudent=new ModelsStudents();
        $modelDS=new Disciplines_Students();
        $studentdata = ['name' => $request->name,'email' => $request->email,];
        $discipline_ids=[];
        foreach ($_POST as $disciplineCheck => $switch){
            if(preg_match("/disciplineCheck[0-9]*/",$disciplineCheck)){
                $tmp=explode("disciplineCheck",$disciplineCheck);
                $disciplineId=$tmp[1];
                if($switch=='on') array_push($discipline_ids,$disciplineId);
            }
        }        
        $disciplinesToRemove=[];
        foreach ($olddiscipline_ids as $disciplineId){
            if(!in_array($disciplineId,$discipline_ids)){
                array_push($disciplinesToRemove,$disciplineId);
            }
        }
        
        Disciplines_Students::where('student','=',$id)->whereIn('discipline',$disciplinesToRemove)->delete();

        $ch=$modelStudent->calculateStudentsHours($id);
        if($ch<=$MAX_HOURS_STUDENT || $ch==false)
        {
            $modelDS->MatriculateToDiscipline($discipline_ids,$id);   
            ModelsStudents::where('id',$id)->update($studentdata);
            return redirect('/students/');
        } else {
            return redirect('/students/edit/$id');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        ModelsAvaliations::where('student',$id)->delete();
        Classes::where('student',$id)->delete();
        Disciplines_Students::where('student',$id)->delete();
        ModelsStudents::where('id',$id)->delete();
        return redirect('/students');
    }
}
