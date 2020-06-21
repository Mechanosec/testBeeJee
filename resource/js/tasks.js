$(document).ready( function () {
    $('#table_id').dataTable({
        "lengthMenu": [3, 5, 10],
        "searching": false,
        "serverSide": true,
        "ajax": {
            url: "/api/task/list",
            dataType: "json",

        },
        "columns": [
            { "data": "user_name" },
            { "data": "email" },
            { "data": "description" },
            { "data": "status" },
        ]
    });

    function ValidateEmail(mail) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
            return true;
        }
        return false;
    }

    $('#save_task').click(function () {
        $('#userNameError').html('');
        $('#emailError').html('');
        $('#descriptionError').html('');
        let task = {};
        task.user_name = $('#userName').val();
        task.email = $('#email').val();
        task.description = $('#description').val();
        if(task.user_name && task.email && ValidateEmail(task.email) && task.description) {
            $('#userNameError').html('');
            $('#emailError').html('');
            $('#descriptionError').html('');

            $.ajax({
                type: 'POST',
                url: '/api/task/save',
                data: {task: task},
                success: (data) => {
                    data = JSON.parse(data)
                    if (data.status) {
                        $('#saveSuccess').html('сохранение прошло успешно');
                        $('#userName').val('');
                        $('#email').val('');
                        $('#description').val('');
                    } else {
                        $('#saveSuccess').html('произошла какая то ошибка, но я вам о ней не скажу');
                    }
                },
            });
        }
        if(!task.user_name) {
            $('#userNameError').html('введите имя');
        }
        if(!task.email) {
            $('#emailError').html('введите email');
        }

        if(!ValidateEmail(task.email)) {
            $('#emailError').html('неверный email');
        }

        if(!task.description) {
            $('#descriptionError').html('введите описание задачи');
        }

    });
} );