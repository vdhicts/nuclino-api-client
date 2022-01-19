<?php

namespace Vdhicts\Nuclino\Endpoints;

use Illuminate\Http\Client\Response;

trait FileEndpoint
{
    public function getFile(string $id): Response
    {
        return $this->get(sprintf('v0/files/%s', $id));
    }
}
