{extends file="site/base.tpl"}
{capture name="content"}
    <div class="content-center">
        <div class="form-group">
            <h4>Вы уверены что хотите выйти?</h4>
            <div class="content-check">
                <label for="confirmLogout"><input type="checkbox" id="confirmLogout">Да, уверен</label>
            </div>
            <h4 id="confirmLogoutError" class="form-text text-danger"></h4>
        </div>
        <button type="button" class="btn btn-primary" id="singOut">Подтвердить</button>
        <br>
    </div>
{/capture}
{capture name="js"}
    <script type="text/javascript" charset="utf8" src="/resource/js/admin.js"></script>
{/capture}