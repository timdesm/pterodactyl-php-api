<?php

namespace Timdesm\PterodactylPhpApi\Managers\Server;

use Timdesm\PterodactylPhpApi\Managers\Manager;
use Timdesm\PterodactylPhpApi\Resources\Collection;
use Timdesm\PterodactylPhpApi\Resources\FileObject;
use Timdesm\PterodactylPhpApi\Resources\SignedUrl;

class ServerFileManager extends Manager
{
    /**
     * Get a collection of server files in a specified directory.
     *
     * @param mixed $serverId
     * @param int   $page
     * @param array $query
     *
     * @return Collection
     */
    public function list($serverId, $path = '/', array $query = [])
    {
        return $this->http->get("servers/$serverId/files/list", array_merge([
            'directory' => $path,
        ], $query));
    }

    /**
     * Get content of the specified file
     *
     * @param int   $serverId
     * @param string $file
     * @param array $query
     *
     * @return mixed
     */
    public function content(int $serverId, $file, array $query = [])
    {
        return $this->http->get("servers/$serverId/files/contents", array_merge([
            'file' => $file,
        ], $query));
    }

    /**
     * Get content of the specified file
     *
     * @param int   $serverId
     * @param string $file
     * @param array $query
     *
     * @return SignedUrl
     */
    public function download(int $serverId, $file, array $query = [])
    {
        return $this->http->get("servers/$serverId/files/download", array_merge([
            'file' => $file,
        ], $query));
    }

    /**
     * Rename the specified file(s) or folder(s)
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return void
     */
    public function rename($serverId, array $data)
    {
        return $this->http->put("servers/$serverId/files/rename", [], $data);
    }

    /**
     * Copies the speicied file
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return void
     */
    public function copy($serverId, array $data)
    {
        return $this->http->post("servers/$serverId/files/copy", [], $data);
    }

    /**
     * Write data to specified file
     *
     * @param mixed $serverId
     * @param mixed $data
     *
     * @return void
     */
    public function write($serverId, $data)
    {
        return $this->http->post("servers/$serverId/files/write", [], $data);
    }

    /**
     * Compress the specified file(s)
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return FileObject
     */
    public function compress($serverId, $data)
    {
        return $this->http->post("servers/$serverId/files/compress", [], $data);
    }

    /**
     * Decompress the specified file
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return void
     */
    public function decompress($serverId, $data)
    {
        return $this->http->post("servers/$serverId/files/decompress", [], $data);
    }

    /**
     * Decompress the specified file
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return void
     */
    public function decompress($serverId, $data)
    {
        return $this->http->post("servers/$serverId/files/decompress", [], $data);
    }

    /**
     * Delete the specified file(s) or folder(s)
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return void
     */
    public function delete($serverId, $data)
    {
        return $this->http->post("servers/$serverId/files/delete", [], $data);
    }

    /**
     * Delete the specified file(s) or folder(s)
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return void
     */
    public function createFolder($serverId, $data)
    {
        return $this->http->post("servers/$serverId/files/create-folder", [], $data);
    }

    /**
     * Get signed url to upload files to the server
     *
     * @param int   $serverId
     * @param array $query
     *
     * @return SignedUrl
     */
    public function upload(int $serverId, $file, array $query = [])
    {
        return $this->http->get("servers/$serverId/files/download", $query);
    }
}
