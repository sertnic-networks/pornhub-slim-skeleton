<?php

declare(strict_types=1);

namespace App\Application\Actions\ProductVideo;

use App\Application\Actions\Action;
use App\Domain\ProductVideo\ProductVideoRepository;
use Psr\Log\LoggerInterface;

abstract class ProductVideoAction extends Action
{
    protected ProductVideoRepository $videoRepository;

    public function __construct(LoggerInterface $logger, ProductVideoRepository $videoRepository)
    {
        parent::__construct($logger);
        $this->videoRepository = $videoRepository;
    }
}
