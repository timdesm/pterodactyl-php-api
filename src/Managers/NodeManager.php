<?php

namespace Timdesm\PterodactylPhpApi\Managers;

use Timdesm\PterodactylPhpApi\Resources\Collection;
use Timdesm\PterodactylPhpApi\Resources\Node;

class NodeManager extends Manager
{
    /**
     * Get a paginated collection of nodes.
     *
     * @param int   $page
     * @param array $query
     *
     * @return Collection
     */
    public function paginate(int $page = 1, array $query = [])
    {
        return $this->http->get('nodes', array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get all nodes.
     *
     * @param array $query
     *
     * @return Collection
     */
    public function all(array $query = [])
    {
        return $this->http->get("nodes", $query);
    }

    /**
     * Get a node instance by id.
     *
     * @param int   $nodeId
     * @param array $query
     *
     * @return Node
     */
    public function get(int $nodeId, array $query = [])
    {
        return $this->http->get("nodes/$nodeId", $query);
    }

    /**
     * Get node configuration by id.
     *
     * @param int   $nodeId
     * @param array $query
     *
     * @return array
     */
    public function getConfiguration(int $nodeId)
    {
        return $this->http->get("nodes/$nodeId/configuration");
    }

    /**
     * Create a new node.
     *
     * @param array $data
     *
     * @return Node
     */
    public function create(array $data)
    {
        return $this->http->post('nodes', [], $data);
    }

    /**
     * Update a specified node.
     *
     * @param int   $nodeId
     * @param array $data
     *
     * @return Node
     */
    public function update(int $nodeId, array $data)
    {
        return $this->http->patch("nodes/$nodeId", [], $data);
    }

    /**
     * Delete the given node.
     *
     * @param int $nodeId
     *
     * @return void
     */
    public function delete(int $nodeId)
    {
        return $this->http->delete("nodes/$nodeId");
    }
}
