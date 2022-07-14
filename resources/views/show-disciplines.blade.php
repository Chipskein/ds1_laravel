<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="/css/tables.css">
</head>

<x-header />
<form action="/disciplines" method="post">
    <h1>Disciplinas</h1>
    @csrf
    <table>
        <theader>
            <tr>
                <th>Nome</th>
                <th>Carga horária</th>
                <th>Profesor</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </theader>
        @foreach ( $disciplines as $discipline )
            <tr>
                <td class='td'>{{$discipline->name}}</td>
                <td class='td'>{{$discipline->hours}}</td>
                <td class='td'>{{$discipline->TeacherName}}</td>
                <td class='td'><a href='/disciplines/edit/{{$discipline->id}}'><img class='plus-button-img' src=/imgs/edit.png> </a> </td> 
                <td class='td'><a href='/disciplines/delete/{{$discipline->id}}'><img class='plus-button-img' src=/imgs/minus.png> </a> </td> 
            </tr>     
        @endforeach
        <tr>
            <td class='td-insert'><input type="text" required name="name" placeholder="Nome"></td>
            <td class='td-insert'><input type="hours" class="inumber" required name="hours" placeholder="00"> horas
            </td>
            <td class='td-insert'>
                <select id="teacher" name="teacher">
                    @foreach ( $teachers as $teacher )
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach                    
                </select>
            </td>
            <td class='td'></td>
            <td class='td'></td>
        </tr>
    </table>
    <input type="submit" class="button" value="Criar nova disciplina">

</form>

</html>