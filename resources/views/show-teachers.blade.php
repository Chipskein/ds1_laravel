<html>

<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="/css/app.css">
        <style>
            table{
                border-spacing: 0px;
                position: relative;
                width: 100%;
            }

th{
    font-weight: bold;
    font-size: 1rem;
    color: #000;
    border: 1px solid #5C9F5C;
    border-left: 0px;
    border-right: 0px;
    height: 40px;
    width: 600px;
}

tr{
    transition: all ease 0.5s;
    cursor: pointer;
}

td {
    font-size: 1rem;
    font-weight: 300;
    text-align: center;
    vertical-align: middle;
    padding-top: 14px;
    padding-bottom: 14px;
    border-bottom: 1px solid #DFD8D8;
}
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
            <td class='td'>11030336</td>
            <td class='td'>Silvio</td>
            <td class='td'>Silvioquintana1@htomail.com</td>
            <td class='td'>10</td>
            <td class='td'>10 horas</td>
            <td class='td'><a><img class='plus-button-img' src=/imgs/edit.png></a></td>
            <td class='td'><a><img class='plus-button-img' src=/imgs/minus.png></a></td>
            
        <tr>
    </table>
    <input type="text" name="name">
    <input type="submit" value="Enviar">
</form>

</html>