<?php

namespace Timdesm\PterodactylPhpApi\Managers\Server;

use Timdesm\PterodactylPhpApi\Managers\Manager;
use Timdesm\PterodactylPhpApi\Resources\Collection;
use Timdesm\PterodactylPhpApi\Resources\ServerSubuser;

class ServerSubuserManager extends Manager
{
    /**
     * Get all subusers for the specified server.
     *
     * @param mixed $serverId
     * @param array $query
     *
     * @return Collection
     */
    public function all($serverId, array $query = [])
    {
        return $this->http->get("servers/$serverId/users", $query);
    }

    /**
     * Get a single subuser for the specified server.
     *
     * @param mixed  $serverId
     * @param string $uuid
     * @param array  $query
     *
     * @return ServerSubuser
     */
    public function get($serverId, $uuid, array $query = [])
    {
        return $this->http->get("servers/$serverId/users/$uuid", $query);
    }

    /**
     * Create a new subuser for the specified server.
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return ServerSubuser
     */
    public function create($serverId, array $data)
    {
        return $this->http->post("servers/$serverId/users", [], $data);
    }

    /**
     * Update an existing subuser.
     *
     * @param mixed  $serverId
     * @param string $uuid
     * @param array  $data
     *
     * @return ServerSubuser
     */
    public function update($serverId, $uuid, array $data)
    {
        return $this->http->post("servers/$serverId/users/$uuid", [], $data);
    }

    /**
     * Delete a subuser from the server.
     *
     * @param mixed  $serverId
     * @param string $uuid
     *
     * @return void
     */
    public function delete($serverId, $uuid)
    {
        return $this->http->delete("servers/$serverId/users/$uuid");
    }
}
