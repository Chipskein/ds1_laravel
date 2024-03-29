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

<x-header/>

<form action="/students/edit/{{$student->id}}" method="post">
    @csrf
    <p>Nome</p>
    <input type="text" value='{{$student->name}}' name="name">

    <p>Email</p>
    <input type="text" value='{{$student->email}}' name="email">


    <div id="discipline-list">
        <ul>
            @foreach ( $disciplines as $discipline )
                <li>    
                    @if (in_array($discipline->id,$matriculatedId))
                        <input checked type="checkbox" name="disciplineCheck{{$discipline->id}}" id=""> {{$discipline->name}} ({{$discipline->TeacherName}}) - {{$discipline->hours}} hrs
                    @else
                        <input type="checkbox" name="disciplineCheck{{$discipline->id}}" id=""> {{$discipline->name}} ({{$discipline->TeacherName}}) - {{$discipline->hours}} hrs
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <input type="submit" value="Enviar">
</form>

</html>