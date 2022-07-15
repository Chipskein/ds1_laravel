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

<form action="/classes/edit/7/28" method="post">
    <p>Aluno: {{$classes}}</p>
    <p>Nota Final</p>
    <input type="text" name="final_note">
    <p>Frequencia</p>
    <input type="text" name="final_freq">

    <input type="submit" value="Enviar">
</form>

</html>