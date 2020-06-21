<?php


use \ClanCats\Hydrahon\Builder;
use ClanCats\Hydrahon\Query\Sql\FetchableInterface;

class DB extends Builder
{
    public function __construct($grammarKey='mysql')
    {
        $dbConfig = require './configs/db.php';
        $connection = new PDO('mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['db'] . '', $dbConfig['user'], $dbConfig['pass']);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::__construct($grammarKey, function ($query, $queryString, $queryParameters) use ($connection) {
            $statement = $connection->prepare($queryString);
            $statement->execute($queryParameters);

            if ($query instanceof FetchableInterface) {
                return $statement->fetchAll(\PDO::FETCH_ASSOC);
            }
        });
    }
}