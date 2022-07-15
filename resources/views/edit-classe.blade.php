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

<form action="/classes/edit/{{$classes->discipline}}/{{$classes->student}}" method="post">
    @csrf
    <p>Nota Final</p>
    <input type="number" name="final_note" value="{{$classes->final_note}}">
    <p>Frequencia</p>
    <input type="number" name="final_freq" value="{{$classes->final_freq}}">

    <input type="submit" value="Enviar">
</form>

</html>