<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use PDO;
use PDOException;

class DBConnector
{
    private string $DNS = '';
    private string $USERNAME = '';
    private string $PASSWORD = '';

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
