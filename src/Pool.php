<?php

namespace obray\ConnectionManager;

use obray\ConnectionManager\Connection;

class Pool
{
    private array $connections = [];
    private array $availability = [];
    private array $usage = [];

    private $maxConnection = 10;

    public function get()
    {
        // get list of available connection keys
        $keys = array_keys(true, $availability, true);
        $lowestUsage = null; $lowestConnectionKey = null;
        forEach($keys as $key){
            if($leastUsedAvailableConn === null) {
                $lowestUsage = $usage[$key];
                $lowestConnectionKey = $key;
            } else if ( $usage[$key] < $lowestUsage ){
                $lowestUsage = $usage[$key];
                $lowestConnectionKey = $key;
            }
        }
        return $connections[$lowestConnectionKey];
    }

    public function start()
    {
        for($i=0;$i<$this->maxConnection;++$i){
            $this->connections[] = new Connection($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASS'], $_ENV['MYSQL_DB_NAME']);
        }
    }

    public function stop()
    {

    }
}