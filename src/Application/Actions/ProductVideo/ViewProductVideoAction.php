<?php

declare(strict_types=1);

namespace App\Application\Actions\ProductVideo;

use Psr\Http\Message\ResponseInterface as Response;

class ViewProductVideoAction extends ProductVideoAction
{
    /**
     * {@inheritDoc}
     */
    protected function action(): Response
    {
        $videoKey = (string) $this->resolveArg('pk');
        $video = $this->videoRepository->findProductVideOfVideoKey($videoKey);

        $this->logger->info("ProductVideo of vkey `$videoKey` was viewed.");

        return $this->respondWithData($video);
    }
}
