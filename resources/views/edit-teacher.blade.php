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
<?php
    var_dump($disciplines);
?>
<form action="/teachers" method="post">
    <p>Nome</p>
    <input type="text" name="name" value='{{$teacher->name}}' >
    <p>Email</p>
    <input type="text" name="email" value='{{$teacher->email}}' >
    <p>Disciplinas</p>
    <select id="discipline">
                    @foreach ( $disciplines as $discipline )
                        <option value={{$discipline->id}}>{{$discipline->name}}</option>
                    @endforeach                    
                </select>
    <p>Carga horária</p>
    <input type="text" name="carga">
    <input type="submit" value="Enviar">
</form>

</html>