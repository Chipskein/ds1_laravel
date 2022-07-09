<html>

<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="/css/tables.css">
</head>
<x-header />
<form action="/teachers" method="post">
    <h1>Professores</h1>
    @csrf
    <table>
        <theader>
            <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Total Disciplinas</th>
                <th>Carga horária</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </theader>

        @foreach ($teachers as $teacher)
            <tr>
                <td class='td'>{{$teacher->id}}</td>
                <td class='td'>{{$teacher->name}}</td>
                <td class='td'>{{$teacher->email}}</td>
                <td class='td'>{{$teacher->DisciplineQt}}</td>
                <td class='td'>{{$teacher->ch}}</td>
                <td class='td'><a href='/teachers/edit/{{$teacher->id}}'><img class='plus-button-img' src=/imgs/edit.png></a></td>
                <td class='td'><a><img class='plus-button-img' src=/imgs/minus.png></a></td>
            <tr>      
        @endforeach
        <tr>
            <form action="/teachers" method="post">
                <td class='td-insert'><input type="text" required name="name" placeholder="Nome"></td>
                <td class='td-insert'><input type="email" required name="email" placeholder="Email"></td>
            </form>

        <tr>
    </table>
    <input type="submit" class="button" value="Criar novo professor">
</form>

</html>