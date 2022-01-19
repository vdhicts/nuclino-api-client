<?php

namespace Vdhicts\Nuclino\Support;

use Illuminate\Support\Str;

class RequestHelper
{
    public static function build(string $url, array $data): string
    {
        $query = http_build_query(array_filter($data));
        if (Str::length($query) === 0) {
            return $url;
        }

        return $url . '?' . $query;
    }
}
