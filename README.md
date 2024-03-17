# Nuclino API Client

Easy to use client for the API of [Nuclino](https://www.nuclino.com/).

## Requirements

This package requires at least PHP 8.1.

## Installation

This package can be used in any PHP project or with any framework.

You can install the package via composer:

`composer require vdhicts/nuclino-api-client`

## Usage

This package is just an easy client for using the Nuclino API. Please refer to the
[API documentation](https://help.nuclino.com/d3a29686-api/) for more information about the responses.

### Getting started

```php
// Initialize the API
$api = new \Vdhicts\Nuclino\Nuclino($apiKey);

// List the items
$response = $api->listItems();

if ($response->ok()) {
    $response->json('data');
}
```

### Handling errors

A `Response` object will always be returned. See
[Error handling](https://laravel.com/docs/8.x/http-client#error-handling) of the Http Client.

```php
if ($response->failed()) {
    var_dump($response->serverError());
}
```

### Laravel

This package can be easily used in any Laravel application. I would suggest adding your credentials to the `.env` file
of the project:

```
NUCLINO_API_KEY=apikey
```

Next create a config file `nuclino.php` in `/config`:

```php
<?php

return [
    'api_key' => env('NUCLINO_API_KEY'),
];
```

And provide the API key to the client:

```php
$api = new \Vdhicts\Nuclino\Nuclino(config('nuclino.api_key'));
```

In the future I might make a Laravel specific package which uses this package.

## Tests

Unit tests are available in the `tests` folder. Run with:

`composer test`

When you want a code coverage report which will be generated in the `build/report` folder. Run with:

`composer test-coverage`

## Contribution

Any contribution is welcome, but it should meet the PSR-12 standard and please create one pull request per feature/bug.
In exchange, you will be credited as contributor on this page.

## Security

If you discover any security related issues in this or other packages of Vdhicts, please email info@vdhicts.nl instead
of using the issue tracker.

## Support

This package isn't an official package from Nuclino, so they probably won't offer support for it. If you encounter a
problem with this client or has a question about it, feel free to open an issue on GitHub.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## About Vdhicts

[Vdhicts](https://www.vdhicts.nl) is the name of my personal company for which I work as freelancer. Vdhicts develops
and implements IT solutions for businesses and educational institutions.
