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

<form action="/teachers" method="post">
    <p>Nome</p>
    <input type="text" name="name">
    <p>Disciplinas</p>
    <select name="discipline" id=""><option>não sei</option></select>
    <p>Professor</p>
    <select name="teacher" id=""><option>não sei</option></select>
    <p>Alunos (Vamos ter que fazer tipo uma tabela de alunos aqui dentro e ele pode tirar e add quem ele quiser)</p>
    <select name="teacher" id=""><option>não sei</option></select>
    <input type="submit" value="Enviar">
</form>

</html>