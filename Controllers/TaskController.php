<?php

namespace Controllers;

use debug\Debug;
use Models\Task;
use Services\TaskService;

class TaskController extends Controller
{
    /**
     * @var TaskService
     */
    protected $taskService;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->taskService = new TaskService();
    }

    public function viewIndex()
    {
        return $this->render('task\index.tpl');
    }

    public function viewCreate()
    {
        return $this->render('task\create.tpl');
    }

    public function getList()
    {
        return $this->apiResponse($this->taskService->getList(), 'data');
    }

    public function onStore()
    {
        $request = $_POST['task'];
        if(Task::onStore($request)) {
            return $this->apiResponse(true, 'empty');
        } else {
            return $this->apiResponse(false, 'empty');
        }
    }
}