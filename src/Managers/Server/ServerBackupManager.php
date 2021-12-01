<?php

namespace Timdesm\PterodactylPhpApi\Managers\Server;

use Timdesm\PterodactylPhpApi\Managers\Manager;
use Timdesm\PterodactylPhpApi\Resources\Collection;
use Timdesm\PterodactylPhpApi\Resources\SignedUrl;
use Timdesm\PterodactylPhpApi\Resources\Backup;

class ServerBackupManager extends Manager
{
    /**
     * Get a paginated collection of backups.
     *
     * @param mixed $serverId
     * @param int   $page
     * @param array $query
     *
     * @return Collection
     */
    public function paginate($serverId, int $page = 1, array $query = [])
    {
        return $this->http->get("servers/$serverId/backups", array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a server instance by id.
     *
     * @param mixed $serverId
     * @param string $backupId
     * @param array $query
     *
     * @return Backup
     */
    public function get($serverId, $backupId, array $query = [])
    {
        return $this->http->get("servers/$serverId/backups/$backupId", $query);
    }

    /**
     * Get download link of the specified backup
     *
     * @param mixed $serverId
     * @param string $backupId
     * @param array $query
     *
     * @return SignedUrl
     */
    public function download($serverId, $backupId, array $query = [])
    {
        return $this->http->get("servers/$serverId/backups/$backupId", $query);
    }

    /**
     * Create a new backup of the specified server
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return void
     */
    public function create($serverId, $data)
    {
        return $this->http->post("servers/$serverId/backups", [], $data);
    }

    /**
     * Delete the specified backup
     *
     * @param mixed $serverId
     * @param string $backupId
     * @param array $data
     *
     * @return void
     */
    public function delete($serverId, $backupId, $data)
    {
        return $this->http->delete("servers/$serverId/backups/$backupId", [], $data);
    }
}
