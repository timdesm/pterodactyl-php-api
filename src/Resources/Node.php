<?php

namespace Timdesm\PterodactylPhpApi\Resources;

class Node extends Resource
{
    /**
     * Delete the node.
     *
     * @return void
     */
    public function delete()
    {
        return $this->pterodactyl->nodes->delete($this->id);
    }

    /**
     * Update the node.
     *
     * @param array $data
     *
     * @return void
     */
    public function update(array $data = [])
    {
        return $this->pterodactyl->nodes->update($this->id, $data);
    }

    /**
     * Get node configuration.
     *
     * @return void
     */
    public function getConfiguration()
    {
        return $this->pterodactyl->nodes->getConfiguration($this->id);
    }
}
