<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="/css/tables.css">
</head>

<x-header />
<form action="/teachers" method="post">
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
                <td class='td'><a><img class='plus-button-img' src=/imgs/minus.png> </a> </td> 
            </tr>     
        @endforeach
        <tr>
            <td class='td-insert'><input type="text" required name="nome" placeholder="Nome"></td>
            <td class='td-insert'><input type="numero" class="inumber" required name="carga" placeholder="00"> horas
            </td>
            <td class='td-insert'>
                <select id="browsers">
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