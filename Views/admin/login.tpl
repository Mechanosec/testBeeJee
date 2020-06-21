{extends file="site/base.tpl"}
{capture name="content"}
    <div class="content-center">
        <h4 id="loginSuccess" class="form-text text-success"></h4>
        <h4 id="singInError" class="form-text text-danger"></h4>
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" class="form-control" id="login" placeholder="Введите логин" required>
            <small id="loginError" class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" id="password" placeholder="Введите пароль" required>
            <small id="passwordError" class="form-text text-danger"></small>
        </div>
        <button type="button" class="btn btn-primary" id="singIn">Войти</button><br>
    </div>
{/capture}
{capture name="js"}
    <script type="text/javascript" charset="utf8" src="/resource/js/admin.js"></script>
{/capture}