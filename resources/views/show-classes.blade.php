<html>

<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="/css/tables.css">
</head>

<x-header/>
<p>{{$classes}}</p>
    <h1>Avaliações de alunos</h1>
        <a class='list' href="{{url('/classes')}}">lista completa</a>
    <form method='get' action="/classes" >
        <input name='searchTeacher' placeholder='professor' />
        <button>Pesquisar</button>
    </form>
    <form method='get' action="/classes" >
        <input name='searchStudent' placeholder='estudante' />
        <button>Pesquisar</button>
    </form>
    @csrf
    <table>
        <theader>
            <tr>
                <th>Disciplina</th>
                <th>Professor</th>
                <th>aluno</th>
                <th>Data inicial</th>
                <th>Data Final</th>
                <th>Nota</th>
                <th>Frequencia</th>
                <th>Editar nota e frequencia</th>
            </tr>
        </theader>
        @foreach ( $classes as $classe )
            <tr>
                <td class='td'>{{$classe->DisciplineName}}</td>
                <td class='td'>{{$classe->TeacherName}}</td>
                <td class='td'>{{$classe->StudentName}}</td>
                <td class='td'>{{$classe->start_date}}</td>
                <td class='td'>{{$classe->end_date}}</td>
                <td class='td'>{{$classe->final_note}}</td>
                <td class='td'>{{$classe->final_freq}}</td>
                <td class='td'><a href='/classes/edit/{{$classe->discipline}}/{{$classe->student}}'><img class='plus-button-img' src=/imgs/edit.png> </a> </td> 
            </tr>     
        @endforeach
        
   </table>

</html>