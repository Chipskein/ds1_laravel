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
<form action="/teachers/edit/{{$teacher->id}}" method="post">
    @csrf
    <p>Nome</p>
    <input type="text" name="name" value='{{$teacher->name}}'>
    <p>Email</p>
    <input type="text" name="email" value='{{$teacher->email}}'>
    <input type="submit" value="Enviar">
</form>

</html>