<?php


namespace Models;


use debug\Debug;

class Task extends Model
{
    public static $tableName = 'tasks';

    const NEW = 10;
    const END = 20;
    const BE_EDIT = 1;
    const NOT_EDIT = 0;

    public static function onStore($request)
    {
        try {
            Task::query()->insert([
                'user_name' => htmlspecialchars($request['user_name']),
                'email' => $request['email'],
                'description' => htmlspecialchars($request['description']),
                'status_id' => self::NEW,
                'changed_admin' => self::NOT_EDIT,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ])->execute();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function onUpdate($request)
    {
        try {
            $taskQuery = Task::query()->update();
            if (isset($request['user_name'])) {
                $taskQuery->set('user_name', $request['user_name']);
            }
            if (isset($request['email'])) {
                $taskQuery->set('email', $request['email']);
            }
            if (isset($request['description'])) {
                $taskQuery->set('description', htmlspecialchars($request['description']));
            }
            if (isset($request['status_end'])) {
                $taskQuery->set('status_id', self::END);
            }
            if (isset($request['be_edit'])) {
                $taskQuery->set('changed_admin', self::BE_EDIT);
            }
            $taskQuery->set('updated_at', date("Y-m-d H:i:s"))
                ->where('id', $request['id'])
                ->execute();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}