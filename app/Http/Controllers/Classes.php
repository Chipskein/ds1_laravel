<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disciplines_Students as ModelsDisciplineStudents;

class Classes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->searchTeacher){ 
            $model=new ModelsDisciplineStudents();
            $classes=$model->getTeacher($request->searchTeacher);
            return view('show-classes',['classes'=>$classes]);
        }else if ($request->searchStudent){ 
            $model=new ModelsDisciplineStudents();
            $classes=$model->getStudent($request->searchStudent);
            return view('show-classes',['classes'=>$classes]);
        }
        else{
            $model=new ModelsDisciplineStudents();
            $classes=$model->getAll();
            return view('show-classes',['classes'=>$classes]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id, $student)
    {
        $model=new ModelsDisciplineStudents();
        $classes=$model->getAllById($id, $student);
        return view('edit-classe',['classes'=>$classes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $student)
    { 
        $data=[
            'final_note' => $request->final_note,
            'final_freq' => $request->final_freq,
        ];
        
        ModelsDisciplineStudents::where('student', $student)->where('discipline', $id)->update($data);
        return redirect('/classes');
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
