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
    <p>Matricula</p>
    <input type="text" name="name">
    <p>Nome</p>
    <p>Email</p>
    <p>Total Disciplinas</p>
    <p>Carga horária</p>
    <input type="submit" value="Enviar">
</form>

</html>