<?php

namespace Vdhicts\Nuclino\Endpoints;

use Illuminate\Http\Client\Response;
use Vdhicts\Nuclino\Support\RequestHelper;

trait TeamEndpoint
{
    public function listTeams(int $limit = 100, string $after = null): Response
    {
        if ($limit > 100) {
            $limit = 100;
        }

        return $this->get(RequestHelper::build('v0/teams', [
            'limit' => $limit,
            'after' => $after,
        ]));
    }

    public function getTeam(string $id): Response
    {
        return $this->get(sprintf('v0/teams/%s', $id));
    }
}
