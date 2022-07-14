<html>

<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="/css/tables.css">
        
</head>

<x-header/>
<?php
    var_dump($students);
?>
<form action="/students" method="post">
    <h1>Alunos</h1>
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
        <tr>
            <td class='td'>11030336</td>
            <td class='td'>Silvio</td>
            <td class='td'>Silvioquintana1@htomail.com</td>
            <td class='td'>10</td>
            <td class='td'>10 horas</td>
            <td class='td'><a><img class='plus-button-img' src=/imgs/edit.png></a></td>
            <td class='td'><a><img class='plus-button-img' src=/imgs/minus.png></a></td>
        <tr>
        <tr>
            <td class='td-insert'><input type="text" required name="name" placeholder="Nome"></td>
            <td class='td-insert'><input type="email" required name="email" placeholder="Email"></td>
            <td class='td-insert'></td>
            <td class='td-insert'></td>
            <td class='td-insert'></td>
        <tr>
    </table>
    <input type="submit" class="button" value="Criar novo estudante">
    
</form>

</html>