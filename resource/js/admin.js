$(document).ready( function () {
    $('#table_id').dataTable({
        "lengthMenu": [3, 5, 10],
        "searching": false,
        "serverSide": true,
        "ajax": {
            url: "/api/admin/taskList",
            dataType: "json",

        },
        "columns": [
            { "data": "user_name" },
            { "data": "email" },
            { "data": "description" },
            { "data": "status" },
            {
                'data': 'id',
                'render': function (item) {
                    console.log(item)
                    return '<a href="/admin/task/edit/' + item + '">Редактировать</a>';
                }
            },
        ]
    });

    function ValidateEmail(mail) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
            return true;
        }
        return false;
    }

    $('#singIn').click(function () {
        let admin = {};
        admin.login = $('#login').val();
        admin.password = $('#password').val();
        if(admin.login && admin.password) {
            $('#loginError').html('');
            $('#passwordError').html('');
            $('#singInError').html('');
            $.ajax({
                type: 'POST',
                url: '/api/admin/login',
                data: {admin: admin},
                success: (data) => {
                    data = JSON.parse(data)
                    if (data.status) {
                        $('#loginSuccess').html('авторизация прошла успешно');
                        window.location.href = "/admin";
                    } else {
                        $('#singInError').html('неверный логин и пароль');
                    }
                },
            });
        }

        if(!admin.login) {
            $('#loginError').html('введите логин');
        }
        if(!admin.password) {
            $('#passwordError').html('введите email');
        }

    });

    $('#singOut').click(function () {
        if($("#confirmLogout").attr("checked") != 'checked') {
            $.ajax({
                type: 'POST',
                url: '/api/admin/logout',
                success: (data) => {
                    data = JSON.parse(data)
                    if (data.status) {
                        window.location.href = "/";
                    } else {
                        $('#confirmLogoutError').html('произошла какая то ошибка, но я вам о ней не скажу');
                    }
                },
            });
        } else {
            $('#confirmLogoutError').html('Вы не дали согласие')
        }
    });

    $('#save_task').click(function () {
        let task = {};
        task.description = $('#description').val();
        if (task.description != $('#oldDescription').val()) {
            task.be_edit = true;
        }
        task.status_end = $('#confirmTask').prop('checked');
        task.id = $('#task_id').val();
        if(task.description) {
            $('#descriptionError').html('');
            $('#saveSuccess').html('');

            $.ajax({
                type: 'POST',
                url: '/api/admin/taskEdit',
                data: {task: task},
                success: (data) => {
                    data = JSON.parse(data)
                    if (data.status) {
                        $('#saveSuccess').html('сохранение прошло успешно');
                    } else {
                        $('#saveSuccess').html('произошла какая то ошибка, но я вам о ней не скажу');
                    }
                },
            });
        }

        if(!task.description) {
            $('#descriptionError').html('введите описание задачи');
        }

    });
} );