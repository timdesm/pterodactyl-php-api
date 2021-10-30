<?php

namespace Timdesm\PterodactylPhpApi;

use GuzzleHttp\Client as Client;
use Timdesm\PterodactylPhpApi\Http;
use Timdesm\PterodactylPhpApi\Exceptions\InvaildApiTypeException;
use Timdesm\PterodactylPhpApi\Managers\AccountManager;
use Timdesm\PterodactylPhpApi\Managers\LocationManager;
use Timdesm\PterodactylPhpApi\Managers\Nest\NestEggManager;
use Timdesm\PterodactylPhpApi\Managers\NestManager;
use Timdesm\PterodactylPhpApi\Managers\Node\NodeAllocationManager;
use Timdesm\PterodactylPhpApi\Managers\NodeManager;
use Timdesm\PterodactylPhpApi\Managers\Server\ServerDatabaseManager;
use Timdesm\PterodactylPhpApi\Managers\ServerManager;
use Timdesm\PterodactylPhpApi\Managers\UserManager;

class PterodactylApi
{
    /**
     * The Pterodactyl base uri.
     *
     * @var string
     */
    public $baseUri;

    /**
     * The Pterodactyl API key.
     *
     * @var string
     */
    public $apiKey;

    /**
     * The API type of the API key.
     *
     * @var string
     */
    public $apiType;

    /**
     * The Http client.
     *
     * @var Http
     */
    public $http;

    /**
     * Account manager.
     *
     * @var AccountManager
     */
    public $account;

    /**
     * Location manager.
     *
     * @var LocationManager
     */
    public $locations;

    /**
     * User manager.
     *
     * @var UserManager
     */
    public $users;

    /**
     * Nest manager.
     *
     * @var NestManager
     */
    public $nests;

    /**
     * Node manager.
     *
     * @var NodeManager
     */
    public $nodes;

    /**
     * Node allocation manager.
     *
     * @var NodeAllocationManager
     */
    public $node_allocations;

    /**
     * Nest egg manager.
     *
     * @var NestEggManager
     */
    public $nest_eggs;

    /**
     * Server manager.
     *
     * @var ServerManager
     */
    public $servers;

    /**
     * Server database manager.
     *
     * @var ServerDatabaseManager
     */
    public $server_databases;

    /**
     * Create a new PterodactylApi instance.
     *
     * @param string             $apiKey
     * @param \GuzzleHttp\Client $guzzle
     *
     * @return void
     */
    public function __construct($baseUri, $apiKey, $apiType = 'application', Client $guzzle = null)
    {
        $this->baseUri = $baseUri;
        $this->apiKey = $apiKey;

        if (!in_array(strtolower($apiType), ['application', 'client'], true)) {
            throw new InvaildApiTypeException();
        }
        $this->apiType = strtolower($apiType);

        $this->http = new Http($this, $guzzle);

        $this->locations = new LocationManager($this);
        $this->users = new UserManager($this);
        $this->nests = new NestManager($this);
        $this->nest_eggs = new NestEggManager($this);
        $this->nodes = new NodeManager($this);
        $this->node_allocations = new NodeAllocationManager($this);
        $this->account = new AccountManager($this);
        $this->servers = new ServerManager($this);
        $this->server_databases = new ServerDatabaseManager($this);
    }
}
