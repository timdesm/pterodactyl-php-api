# Pterodactyl PHP API

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)
[![Chat on Discord][ico-chat]][link-chat]

**This project is for Pterodactyl Panel v1.x**

[Documentation](https://pterodactyl-api-docs.netvpx.com/docs/intro)

## Install Pterodactyl PHP API via Composer

You can install the Pterodactyl PHP API into your project using [Composer](https://getcomposer.org).

```bash
$ composer require timdesm/pterodactyl-php-api
```

This project requires PHP version `5.6.4` or `later`.

## Usage

First create an Application or Account (client) API key. Some features work only with Application or Client API keys.
The API type is specified as a string, default is `application`. To use the Account API specify `client` as API type.

```php
$pterodactylApi = new \Timdesm\PterodactylPhpApi\PterodactylApi(BASE_URI_HERE, API_KEY_HERE, API_TYPE_HERE);
```

Or use the following method

```php
use Timdesm\PterodactylPhpApi\PterodactylApi;
$pterodactylApi = new PterodactylApi(BASE_URI_HERE, API_KEY_HERE, API_TYPE_HERE);
```

## Features

This SDK now mirrors the structure of the [official API surface](https://pterodactyl-api-docs.netvpx.com/docs/intro) and exposes
helpers for both Application and Client integrations:

* Full account management including API keys, permissions, activity logs and two factor enable/disable flows.
* Extended server tooling with dedicated managers for backups, databases, files (including chmod, remote pulls, uploads),
  schedules and subusers.
* Updated HTTP layer with automatic JSON encoding, query filtering and support for every v1 endpoint prefix.

### Examples

```php
// Fetch the current user's API keys
$client = new PterodactylApi('https://panel.example.com', 'client-token', 'client');
$keys = $client->account->apiKeys();

// Schedule a power action on a server
$schedule = $client->server_schedules->create($serverId, [
    'name'        => 'Restart every night',
    'cron_day_of_week' => '*',
    'cron_day_of_month' => '*',
    'cron_hour'   => '3',
    'cron_minute' => '0',
    'is_active'   => true,
]);

$client->server_schedules->createTask($serverId, $schedule->id, [
    'action'     => 'power',
    'payload'    => 'restart',
    'time_offset'=> 0,
]);
```

## Some Handy Links

* [Documentation](https://pterodactyl-api-docs.netvpx.com/docs/intro) - The community maintained Pterodactyl API documentation.
* [Pterodactyl](https://pterodactyl.io/) - The Pterodactyl Panel project website.
* [Pterodactyl API v1](https://dashflo.net/docs/api/pterodactyl/v1/) - Pterodactyl API v1 Documentation.

## Get Support!

First check the [Documentation](https://pterodactyl-api-docs.netvpx.com/docs/intro) for more information regarding the usage of this project. `Note: The documentation- pages are still under construction.`

You can get support by going to our [Discord server](https://discord.gg/VgkQPbG) or [submitting new issue](https://github.com/timdesm/pterodactyl-php-api/issues/new).

## Contributing

If you want to contribute to this project, fetch it locally and open a pull request to get your branch merged.

## License

`timdesm/pterodactyl-php-api` is licensed under the MIT License (MIT). Please see the
[license file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/timdesm/pterodactyl-php-api.svg
[ico-license]: https://img.shields.io/badge/license-MIT-green.svg
[ico-downloads]: https://img.shields.io/packagist/dt/timdesm/pterodactyl-php-api.svg
[ico-chat]: https://img.shields.io/discord/596022838196961341

[link-packagist]: https://packagist.org/packages/timdesm/pterodactyl-php-api
[link-downloads]: https://packagist.org/packages/timdesm/pterodactyl-php-api
[link-chat]: https://discord.gg/VgkQPbG
