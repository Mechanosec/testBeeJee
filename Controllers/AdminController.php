<?php


namespace Controllers;


use debug\Debug;
use Models\Task;
use Services\AdminService;

class AdminController extends Controller
{
    /**
     * @var AdminService
     */
    protected $adminService;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->adminService = new AdminService();
    }

    public function viewIndex()
    {
        return $this->render('admin\index.tpl');
    }

    public function viewEdit($id)
    {
        $task = Task::findBy('id', $id);
        return $this->render('admin\taskEdit.tpl', ['task' => $task]);
    }


    public function viewLogin()
    {
        return $this->render('admin\login.tpl');
    }

    public function viewLogout()
    {
        return $this->render('admin\logout.tpl');
    }


    public function getList()
    {
        return $this->apiResponse($this->adminService->getList(), 'data');
    }

    public function login()
    {
        $request = $_POST['admin'];
        if($this->adminService->login($request)){
            return $this->apiResponse(true, 'empty');
        } else {
            return $this->apiResponse(false, 'empty');
        }
    }

    public function logout()
    {
        if($this->adminService->logout()){
            return $this->apiResponse(true, 'empty');
        } else {
            return $this->apiResponse(false, 'empty');
        }
    }

    public function onUpdate()
    {
        $request = $_POST['task'];
        if(Task::onUpdate($request)) {
            return $this->apiResponse(true, 'empty');
        } else {
            return $this->apiResponse(false, 'empty');
        }
    }
}