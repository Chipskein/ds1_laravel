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

<form action="/discipline" method="post">
    <p>Nome</p>
    <input type="text" name="name">
    <p>Professor</p>
    <select name="teacher" id=""><option>não sei</option></select>
    <p>Carga horária</p>
    <input type="text" name="carga">
    <input type="submit" value="Enviar">
</form>

</html>