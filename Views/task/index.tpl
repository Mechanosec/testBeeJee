{extends file="site/base.tpl"}
{capture name="content"}
    <table id="table_id" class="display">
        <thead>
        <tr>
            <th width="250px">Имя пользователя</th>
            <th width="250px">Email</th>
            <th>Описание</th>
            <th width="250px">Статус</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
{/capture}
{capture name="js"}
    <script type="text/javascript" charset="utf8" src="/resource/js/tasks.js"></script>
{/capture}