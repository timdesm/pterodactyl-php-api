<?php

namespace Timdesm\PterodactylPhpApi\Managers;

use Timdesm\PterodactylPhpApi\Resources\Collection;
use Timdesm\PterodactylPhpApi\Resources\Nest;

class NestManager extends Manager
{
    /**
     * Get a paginated collection of nests.
     *
     * @param int   $page
     * @param array $query
     *
     * @return Collection
     */
    public function paginate(int $page = 1, array $query = [])
    {
        return $this->http->get('nests', array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get all nests.
     *
     * @param array $query
     *
     * @return Collection
     */
    public function all(array $query = [])
    {
        return $this->http->get("nests", $query);
    }

    /**
     * Get a nest instance by id.
     *
     * @param int   $nestId
     * @param array $query
     *
     * @return Nest
     */
    public function get(int $nestId, array $query = [])
    {
        return $this->http->get("nests/$nestId", $query);
    }
}
