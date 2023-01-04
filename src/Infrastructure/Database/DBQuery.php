<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use PDO;

class DBQuery extends DBConnector
{
    protected function query(string $SQL, array $Params = null, bool $isManyResult = false)
    {
        $connect = $this->connect();

        if ($connect[0] && $stmt = $connect[1]->prepare($SQL))
        {
            if ($stmt->execute($Params))
            if ($isManyResult)
            return [true, $stmt->fetchAll(PDO::FETCH_OBJ)];
            return [true, $stmt->fetch(PDO::FETCH_OBJ)];
        }

        return $connect;
    }
}
