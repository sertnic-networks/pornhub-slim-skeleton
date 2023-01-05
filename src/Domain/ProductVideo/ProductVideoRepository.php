<?php

declare(strict_types=1);

namespace App\Domain\ProductVideo;

interface ProductVideoRepository
{
    /**
     * @return ProductVideo[]
     */
    public function findAll(): array;

    /**
     * @return ProductVideo
     * @throws ProductVideoNotFoundException
     */
    public function findProductVideOfVideoKey(string $vkey): ProductVideo;
}
