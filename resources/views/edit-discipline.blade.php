<html>

<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="/css/app.css">
        <style>
            form{ 
                margin:50px;
            }
            .plus-button-img {
                width: 30px;
                height:30px;
              }
        </style>
</head>
<body>
    

<x-header/>

<form action="/disciplines/edit/{{$discipline->id}}" method="post">
    @csrf
    <p>Nome</p><input type="text" name="name" value="{{$discipline->name}}">
    <p>Professor</p>
    <select name="teacher" >
        @foreach ($teachers as $teacher)
            @if($teacher->id==$discipline->TeacherId)
                <option value="{{$teacher->id}}" selected >{{$teacher->name}}</option>
                @else
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endif
            
        @endforeach
        <option value="{{$discipline->TeacherId}}">{{$discipline->TeacherName}}</option>
    </select>
    <p>Carga horária</p><input type="text" name="hours" value="{{$discipline->hours}}">
    <input type="submit" value="Enviar">
</form>

    <form action="/disciplines/edit/{id}" method="post">
        <p>Nome</p>
        <input type="text" name="name" value='{{$discipline->name}}' >
        <p>Professor</p>
        <select id="teacher">
            @foreach ( $teachers as $teacher )
                <option value={{$teacher->id}}>{{$teacher->name}}</option>
            @endforeach                    
        </select>
        <p>Carga horária</p>
        <input type="text" name="hours">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>