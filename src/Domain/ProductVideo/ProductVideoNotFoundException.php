<?php

declare(strict_types=1);

namespace App\Domain\ProductVideo;

use App\Domain\DomainException\DomainRecordNotFoundException;

class ProductVideoNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The product video you requested does not exist.';
}
