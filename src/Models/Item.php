<?php

namespace Vdhicts\Nuclino\Models;

use Illuminate\Contracts\Support\Arrayable;
use Vdhicts\Nuclino\Enum\ItemObject;

class Item implements Arrayable
{
    private ?string $workspaceId = null;

    private ?string $parentId = null;

    private string $object = ItemObject::ITEM;

    private string $title = '';

    private string $content = '';

    private ?int $index = null;

    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(?string $workspaceId): Item
    {
        $this->workspaceId = $workspaceId;
        $this->parentId = null;

        return $this;
    }

    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    public function setParentId(?string $parentId): Item
    {
        $this->parentId = $parentId;
        $this->workspaceId = null;

        return $this;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function setObject(string $object): Item
    {
        if (in_array($object, ItemObject::AVAILABLE)) {
            $this->object = $object;
        }

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Item
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Item
    {
        $this->content = $content;

        return $this;
    }

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function setIndex(?int $index): Item
    {
        $this->index = $index;

        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            'workspaceId' => $this->workspaceId,
            'parentId' => $this->parentId,
            'object' => $this->object,
            'title' => $this->title,
            'content' => $this->content,
            'index' => $this->index,
        ]);
    }
}
