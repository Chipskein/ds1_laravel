<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplines as ModelsDisciplines;
use App\Models\Disciplines_Students as ModelsDisciplineStudents;
use App\Models\Teachers as ModelsTeachers;
class Disciplines extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=new ModelsDisciplines();
        $teachers=ModelsTeachers::get();
        $disciplines=$model->getAll();
        return view('show-disciplines',['teachers'=>$teachers,'disciplines'=>$disciplines]);
    }

    public function delete($id)
    {
        ModelsDisciplineStudents::where('discipline',$id)->delete();
        ModelsDisciplines::where('id',$id)->delete();
        return redirect('/disciplines');
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
            'hours'=>$request->hours,
            'teacher'=>$request->teacher,
        ];
        echo "<pre>";
            var_dump($request);
        echo "</pre>";
        //$DisciplineId=ModelsDisciplines::create($data)->id;
        //return redirect('/discipline');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        return view('edit-discipline');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
