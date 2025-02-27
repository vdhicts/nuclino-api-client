<?php

namespace Vdhicts\Nuclino\Tests\Unit;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use Vdhicts\Nuclino\Nuclino;

class NuclinoTest extends TestCase
{
    public function testRequest()
    {
        $apiKey = Str::random();
        $id = Str::random();

        $client = new Nuclino($apiKey);
        $client->fake();
        $response = $client->getItem($id);

        $this->assertTrue($response->ok());
        $client->assertSent(function (Request $request) use ($apiKey, $id) {
            return
                $request->hasHeader('Authorization', $apiKey) &&
                $request->hasHeader('Accept', 'application/json') &&
                $request->url() == 'https://api.nuclino.com/v0/items/' . $id;
        });
    }
}
