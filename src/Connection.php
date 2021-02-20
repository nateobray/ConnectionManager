<?php
namespace obray\ConnectionManager;

class Connection
{
    private $available = false;
    private $connection = null;

    public function __construct(string $host, string $user, string $pass, $dbname)
    {
        $connection = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
    }

    public function use()
    {
        $this->avaliable = false;
        return $connection;
    }

    public function release()
    {
        $this->available = true;
    }
}