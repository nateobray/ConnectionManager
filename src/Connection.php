<?php
namespace obray\ConnectionManager;

class Connection extends \PDO
{
    private $usage = 0;

    public function incrementUsage()
    {
        ++$this->usage;
    }
}