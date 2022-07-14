<?php

namespace App\Http\Controllers;

use App\Models\Teachers as ModelsTeachers;
use App\Models\Disciplines as ModelsDisciplines;
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
        ModelsDisciplines::where('teacher',$id)->delete();
        ModelsTeachers::where('id',$id)->delete();
        return redirect('/teachers');
    }

    public function edit($id)
    {
        $teacher=ModelsTeachers::where('id',$id)->first();
        $email=$teacher->email;
        $name=$teacher->name;
        return view('edit-teacher',['name'=>$name,'email'=>$email]);
    }

    public function update(Request $request, $id)
    {
        $teacher = ModelsTeachers::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->save();
        return redirect('/teachers');
    }

}
