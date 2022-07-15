<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style>
            a{
                text-decoration:none;
            }
    header {
        background-color: #5C9F5C;
        width: 100%;
        padding:0px;
        margin:0px;
    }
    body {
        margin:0px;
        padding:0px;
    }
    .header {
        display: flex;
        justify-content: space-between;
        display: flex;
        align-items: center;
        padding:0px 50px 0px 50px;
    }
    .headerNav {
        display: flex;
        align-items: center;
    }
    .navItem {
        margin-left: 20px;
        font-size: 18px;
        color:white;
        cursor:pointer
    }
    .headerTitle {
        font-size: 32px;
        color:white;
    }
        </style>
</head>
<header>
    <div class='header'>
    <p class='headerTitle'>Sistema acadêmico</p>
    <div class='headerNav'>
        <a href="{{url('/students')}}" class='navItem'>Alunos</a>
        <a href="{{url('/teachers')}}" class='navItem'>Professores</a>
        <a href="{{url('/disciplines')}}" class='navItem'>Disciplinas</a>
        <a href="{{url('/classes')}}" class='navItem'>Avaliações</a>
    </div>
    </div>
</header>