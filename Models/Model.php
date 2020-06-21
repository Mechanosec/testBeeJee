<?php

namespace Models;

use debug\Debug;
use ClanCats\Hydrahon\Query\Sql\Func as Raw;

class Model
{
    private static $builder = null;
    public static $tableName;

    /**
     * @return mixed
     */
    public static function query()
    {
        if (null == self::$builder) {
            self::$builder = new \DB();
        }
        return self::$builder->table(static::$tableName);
    }

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public static function findBy($field, $value)
    {
        return self::query()->select()->where($field, $value)->one();
    }

    /**
     * @param $query
     * @return array
     */
    public static function paginate($query)
    {
        $paginateRequest = $_GET;
        $countPages =  self::query()->select()->addField(new Raw('count', 'id'), 'count')->one()['count'];

        $orderColumn = $paginateRequest['order'][0]['column'];
        $query->orderBy($paginateRequest['columns'][$orderColumn]['data'], $paginateRequest['order'][0]['dir']);

        $data = $query->limit($paginateRequest['start'], $paginateRequest['length'])->get();
        return [
            'data' => $data,
            'recordsFiltered' => $countPages,
            'recordsTotal' => $countPages,
        ];
    }
}