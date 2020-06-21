<?php


namespace Services;

use Models\Admin;
use Models\Task;
use ClanCats\Hydrahon\Query\Expression as Ex;

class AdminService
{
    public function getList() {
        $taskQuery =  Task::query()->select(['tasks.id', 'tasks.user_name', 'tasks.email', 'tasks.description']);
        $taskQuery->addField(new Ex('CONCAT(statuses.name, IF(tasks.changed_admin=1, ",отредактировано администратором", ""))'), 'status');
        $taskQuery->join('statuses', 'statuses.id', '=', 'tasks.status_id');
        return Task::paginate($taskQuery);
    }

    public function login($request)
    {
        if($admin = Admin::login($request)) {
            $_SESSION['admin'] = $admin;
            return true;
        }
        return false;
    }

    public function logout()
    {
        try {
            unset($_SESSION['admin']);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}