<?php

namespace obray\ConnectionManager;

use obray\ConnectionManager\Connection;

class Pool
{
    private array $connections = [];
    
    private $maxConnection = 10;

    public function __get(string $name)
    {
        if($name === 'dbh'){
            $connection = array_shift($this->connections);
            $connection->incrementUsage();
            return $connection;
        }
    }

    public function release(\obray\ConnectionManager\Connection $connection)
    {
        
        $this->connections[] = $connection;
    }

    public function start()
    {
        for($i=0;$i<$this->maxConnection;++$i){
            $this->connections[] = new Connection("mysql:host=".$_ENV['MYSQL_HOST'].";dbname=".$_ENV['MYSQL_DB_NAME'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASS']);
        }
    }

    public function stop()
    {

    }
}