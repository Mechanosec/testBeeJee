{extends file="site/base.tpl"}
{capture name="content"}
    <div class="content-center">
        <input type="hidden" id="task_id" value="{$task.id}">
        <h3 id="saveSuccess" class="form-text text-success"></h3>
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" id="userName" value="{$task.user_name}" disabled>
            <small id="userNameError" class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" value="{$task.email}" disabled>
            <small id="emailError" class="form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label for="description">Текст задачи</label>
            <input type="hidden" id="oldDescription" value="{$task.description}">
            <textarea class="form-control" id="description" rows="3">{$task.description}</textarea>
            <small id="descriptionError" class="form-text text-danger"></small>
        </div>
        <div class="content-check">
            <label for="confirmTask"><input type="checkbox" {if $task.status_id == Models\Task::END} checked {/if} id="confirmTask">Выполнена</label>
        </div>
        <button type="submit" id="save_task" class="btn btn-primary">Сохранить</button>
    </div>
{/capture}
{capture name="js"}
    <script type="text/javascript" charset="utf8" src="/resource/js/admin.js"></script>
{/capture}