{extends file="site/base.tpl"}
{capture name="content"}
    <div class="content-center">
        <h3 id="saveSuccess" class="form-text text-success"></h3>
        <div class="form-group">
            <label for="userName">Ваше имя</label>
            <input type="text" class="form-control" id="userName" placeholder="Введите имя">
            <small id="userNameError" class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="email">
            <small id="emailError" class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label for="description">Текст задачи</label>
            <textarea class="form-control" id="description" rows="3"></textarea>
            <small id="descriptionError" class="form-text text-danger"></small>
        </div>
        <button type="submit" id="save_task" class="btn btn-primary">Сохранить</button>
    </div>
{/capture}
{capture name="js"}
    <script type="text/javascript" charset="utf8" src="/resource/js/tasks.js"></script>
{/capture}