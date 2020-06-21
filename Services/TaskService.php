<?php


namespace Services;


use debug\Debug;
use Models\Task;

class TaskService
{
    public function getList() {
        $taskQuery =  Task::query()->select(['tasks.id', 'tasks.user_name', 'tasks.email', 'tasks.description', 'statuses.name as status']);
        $taskQuery->join('statuses', 'statuses.id', '=', 'tasks.status_id');
        return Task::paginate($taskQuery);
    }
}