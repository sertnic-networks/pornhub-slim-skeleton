<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\ProductVideo;

use App\Domain\ProductVideo\ProductVideo;
use App\Domain\ProductVideo\ProductVideoNotFoundException;
use App\Domain\ProductVideo\ProductVideoRepository;
use App\Infrastructure\Database\DBQuery;

class InDatabaseProductVideoRepository extends DBQuery implements ProductVideoRepository
{
    /**
     * @var ProductVideo[]
     */
    private array $videos;

    /**
     * @param ProductVideo[]|null $videos
     */
    public function __construct(array $videos = null)
    {
        $this->videos = $videos ?? [];
    }

    /**
     * {@inheritDoc}
     */
    public function findAll(): array
    {
        $videos = $this->query(
            "SELECT * FROM product_videos ORDER BY pvid DESC",
            null,
            true
        );

        return $videos[1];
    }

    /**
     * {@inheritDoc}
     */
    public function findProductVideOfVideoKey(string $vkey): ProductVideo
    {
        $video = $this->query(
            "SELECT * FROM product_videos WHERE vkey = ?",
            [
                $vkey
            ]
        );

        if (!$video[0])
        throw new ProductVideoNotFoundException();

        return new ProductVideo(
            $video[1]->pvid,
            $video[1]->create_at,
            $video[1]->update_at,
            $video[1]->delete_at,
            $video[1]->vkey,
            $video[1]->status,
            $video[1]->owner_id,
            $video[1]->name
        );
    }
}
