<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use PDO;
use PDOException;

class DBConnector
{
    private string $DNS = 'mysql:dbname=pornhub;host=127.0.0.1';
    private string $USERNAME = 'client';
    private string $PASSWORD = '7iyzlg6xfgUCfDAD';

    protected function connect()
    {
        try
        {
            $PDO = new PDO($this->DNS, $this->USERNAME, $this->PASSWORD);
            return [true, $PDO];
        }
        catch (PDOException $err)
        {
            return [false, $err];
        }
    }
}
