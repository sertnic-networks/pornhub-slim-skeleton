<?php

declare(strict_types=1);

namespace App\Domain\ProductVideo;

use JsonSerializable;

class ProductVideo implements JsonSerializable
{
    private $id;
    private $createAt;
    private $updateAt;
    private $deleteAt;
    private $vkey;
    private $status;
    private $ownerId;
    private $name;

    public function __construct(
        ?int    $id,
        ?string $createAt,
        ?string $updateAt,
        ?string $deleteAt,
        string  $vkey,
        int     $status,
        int     $ownerId,
        string  $name
    )
    {
        $this->id = $id;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $this->deleteAt = $deleteAt;
        $this->vkey = $vkey;
        $this->status = $status;
        $this->ownerId = $ownerId;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreateAt()
    {
        return $this->createAt;
    }

    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    public function getDeleteAt()
    {
        return $this->deleteAt;
    }

    public function getVideoKey()
    {
        return $this->vkey;
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0:
                return 'Public';
            
            default:
                return 'NULL';
        }
    }

    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function getTitleName()
    {
        return $this->name;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'create_at' => $this->createAt,
            'update_at' => $this->updateAt,
            'delete_at' => $this->deleteAt,
            'video_key' => $this->vkey,
            'status' => $this->getStatus(),
            'owner' => $this->ownerId,
            'name' => $this->name,
        ];
    }
}
