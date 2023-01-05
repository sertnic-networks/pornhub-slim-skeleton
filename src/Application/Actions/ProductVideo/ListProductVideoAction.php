<?php

declare(strict_types=1);

namespace App\Application\Actions\ProductVideo;

use Psr\Http\Message\ResponseInterface as Response;

class ListProductVideoAction extends ProductVideoAction
{
    /**
     * {@inheritDoc}
     */
    protected function action(): Response
    {
        $videos = $this->videoRepository->findAll();

        $this->logger->info("ProductVideo list was viewed.");

        return $this->respondWithData($videos);
    }
}
