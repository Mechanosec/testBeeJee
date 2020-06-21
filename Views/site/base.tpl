<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BeeJee</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/resource/css/style.css">
</head>
<body>
<nav>
    <div class="container">
        <div id="menu">
            <ul class="toplinks">
                <li><a href="/">Главная</a></li>
                {if $smarty.session.admin.login}
                    <li><a href="/admin">Админ панель</a></li>
                    <li>Вы: {$smarty.session.admin.login}</li>
                    <li><a href="/admin/logout">Выйти</a></li>
                {else}
                    <li><a href="/admin/login">Авторизация</a></li>
                {/if}
                <li><a href="/task/create">Создать задачу</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="content">
    {$smarty.capture.content}
</div>
<footer>
    <div class="container">
        <p>Александр Красовский</p>
    </div>
</footer>

<script type="text/javascript" charset="utf8" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
{$smarty.capture.js}
</body>
</html>
