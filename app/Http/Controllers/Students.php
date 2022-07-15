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
        // $modelDiscStudent=new Disciplines_Students();
        // $disciplineStudents = $modelDiscStudent->getAll();
        $disciplines=$model->getAll();

        return view('edit-student',['disciplines'=>$disciplines, 'student'=>$student]);
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
        $modelDiscipline=new ModelsDisciplines();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        //ModelsStudents::where('id',$id)->update($data);
        
        $disciplines = $modelDiscipline->getAll();
        $discRequest = [];
        foreach ($disciplines as $value) {
            if($_POST["disciplineCheck$value->id"]){
                $discRequest[] = $_POST["disciplineCheck$value->id"];
            }
        }
        print_r($discRequest);
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
        ModelsStudents::where('id',$id)->delete();
        return redirect('/students');
    }
}
