<?php

namespace Vdhicts\Nuclino;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Vdhicts\Nuclino\Endpoints\FileEndpoint;
use Vdhicts\Nuclino\Endpoints\ItemEndpoint;
use Vdhicts\Nuclino\Endpoints\TeamEndpoint;
use Vdhicts\Nuclino\Endpoints\WorkspaceEndpoint;

class Nuclino extends Factory
{
    use TeamEndpoint;
    use WorkspaceEndpoint;
    use ItemEndpoint;
    use FileEndpoint;

    private const TIMEOUT = 180;
    private const VERSION = '1.0.0';
    private const USER_AGENT = 'vdhicts-nuclino-api-client/' . self::VERSION;
    private const BASE_URL = 'https://api.nuclino.com/';

    protected string $apiKey;

    public function __construct(string $apiKey)
    {
        parent::__construct();

        $this->apiKey = $apiKey;
    }

    protected function newPendingRequest(): PendingRequest
    {
        return parent::newPendingRequest()
            ->acceptJson()
            ->asJson()
            ->baseUrl(self::BASE_URL)
            ->withHeaders(['Authorization' => $this->apiKey])
            ->timeout(self::TIMEOUT)
            ->withUserAgent(self::USER_AGENT);
    }
}
