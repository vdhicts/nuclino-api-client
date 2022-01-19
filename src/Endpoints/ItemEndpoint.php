<?php

namespace Vdhicts\Nuclino\Endpoints;

use Illuminate\Http\Client\Response;
use Vdhicts\Nuclino\Models\Item;
use Vdhicts\Nuclino\Support\RequestHelper;

trait ItemEndpoint
{
    public function listItems(
        string $teamId = null,
        string $workspaceId = null,
        int $limit = 100,
        string $after = null
    ): Response {
        if ($limit > 100) {
            $limit = 100;
        }

        return $this->get(
            RequestHelper::build('v0/items', [
                'teamId' => $teamId,
                'workspaceId' => $workspaceId,
                'limit' => $limit,
                'after' => $after,
            ])
        );
    }

    public function searchItems(
        string $search,
        string $teamId = null,
        string $workspaceId = null,
        int $limit = 100
    ): Response {
        if ($limit > 100) {
            $limit = 100;
        }

        return $this->get(
            RequestHelper::build('v0/items', [
                'teamId' => $teamId,
                'workspaceId' => $workspaceId,
                'limit' => $limit,
                'search' => $search,
            ])
        );
    }

    public function getItem(string $id): Response
    {
        return $this->get(sprintf('v0/items/%s', $id));
    }

    public function createItem(Item $item): Response
    {
        return $this->post('v0/items', $item->toArray());
    }

    public function updateItem(string $id, Item $item): Response
    {
        return $this->put(sprintf('v0/items/%s', $id), $item->toArray());
    }

    public function deleteItem(string $id): Response
    {
        return $this->delete(sprintf('v0/items/%s', $id));
    }
}
