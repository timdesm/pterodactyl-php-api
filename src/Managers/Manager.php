<?php

namespace Timdesm\PterodactylPhpApi\Managers;

use Timdesm\PterodactylPhpApi\Http;
use Timdesm\PterodactylPhpApi\PterodactylApi;

class Manager
{
    /**
     * The Pterodactyl instance.
     *
     * @var Pterodactyl
     */
    public $pterodactyl;

    /**
     * The Http client.
     *
     * @var Http
     */
    public $http;

    /**
     * The API type of the API key.
     *
     * @var string
     */
    public $apiType;

    public function __construct(PterodactylApi $pterodactyl)
    {
        $this->pterodactyl = $pterodactyl;

        $this->http = $this->pterodactyl->http;

        $this->apiType = $this->pterodactyl->apiType;
    }
}
