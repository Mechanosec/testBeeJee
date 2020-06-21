<?php

namespace Controllers;

use debug\Debug;

class Controller
{
    protected $tpl;

    public function __construct()
    {
        $this->tpl = new \Smarty();
        $this->tpl->template_dir = 'Views';
        $this->tpl->compile_dir = 'template_c';
        $this->tpl->config_dir = 'config';
        $this->tpl->cache_dir = 'cache';
    }

    public function render($tpl, array $data=[])
    {
        foreach ($data as $key=>$datum) {
            $this->tpl->assign($key, $datum);
        }
        $this->tpl->display($tpl);
    }

    public function apiResponse($data, $type)
    {
        switch ($type) {
            case 'empty' :
                return json_encode(['status' => $data]);
                break;
            case 'data' :
                $data['status'] = true;
                return json_encode($data);
                break;
        }
    }
}