<?php

namespace App\Http\Controllers;

use App\Models\Teachers as ModelsTeachers;
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
        return view('show-teachers');
    }

    public function create(Request $request)
    {
        $data=[
            'name'=>$request->name,
        ];
        $teacherId=ModelsTeachers::create($data)->id;

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $name=ModelsTeachers::where('id',$id)->first()->name;
        return view('edit-teacher',['name'=>$name]);
    }

    public function update(Request $request, $id)
    {
        $teacher = ModelsTeachers::find($id);
        $teacher->name = $request->name;
        $teacher->save();
        //redirect
    }

}
