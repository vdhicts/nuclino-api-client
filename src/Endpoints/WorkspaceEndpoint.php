<?php

namespace Vdhicts\Nuclino\Endpoints;

use Illuminate\Http\Client\Response;
use Vdhicts\Nuclino\Support\RequestHelper;

trait WorkspaceEndpoint
{
    public function listWorkspaces(string $teamId = null, int $limit = 100, string $after = null): Response
    {
        if ($limit > 100) {
            $limit = 100;
        }

        return $this->get(RequestHelper::build('v0/workspaces', [
            'teamId' => $teamId,
            'limit' => $limit,
            'after' => $after,
        ]));
    }

    public function getWorkspace(string $id): Response
    {
        return $this->get(sprintf('v0/workspaces/%s', $id));
    }
}
