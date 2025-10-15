<?php

namespace Timdesm\PterodactylPhpApi\Managers\Server;

use Timdesm\PterodactylPhpApi\Managers\Manager;
use Timdesm\PterodactylPhpApi\Resources\Collection;
use Timdesm\PterodactylPhpApi\Resources\ScheduleTask;
use Timdesm\PterodactylPhpApi\Resources\ServerSchedule;

class ServerScheduleManager extends Manager
{
    /**
     * Get a paginated collection of schedules for a server.
     *
     * @param mixed $serverId
     * @param int   $page
     * @param array $query
     *
     * @return Collection
     */
    public function paginate($serverId, int $page = 1, array $query = [])
    {
        return $this->http->get("servers/$serverId/schedules", array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get all schedules for a server.
     *
     * @param mixed $serverId
     * @param array $query
     *
     * @return Collection
     */
    public function all($serverId, array $query = [])
    {
        return $this->http->get("servers/$serverId/schedules", $query);
    }

    /**
     * Get a schedule instance by id.
     *
     * @param mixed $serverId
     * @param int   $scheduleId
     * @param array $query
     *
     * @return ServerSchedule
     */
    public function get($serverId, int $scheduleId, array $query = [])
    {
        return $this->http->get("servers/$serverId/schedules/$scheduleId", $query);
    }

    /**
     * Create a new schedule for the server.
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return ServerSchedule
     */
    public function create($serverId, array $data)
    {
        return $this->http->post("servers/$serverId/schedules", [], $data);
    }

    /**
     * Update an existing schedule.
     *
     * @param mixed $serverId
     * @param int   $scheduleId
     * @param array $data
     *
     * @return ServerSchedule
     */
    public function update($serverId, int $scheduleId, array $data)
    {
        return $this->http->put("servers/$serverId/schedules/$scheduleId", [], $data);
    }

    /**
     * Delete the given schedule.
     *
     * @param mixed $serverId
     * @param int   $scheduleId
     *
     * @return void
     */
    public function delete($serverId, int $scheduleId)
    {
        return $this->http->delete("servers/$serverId/schedules/$scheduleId");
    }

    /**
     * Run the given schedule immediately.
     *
     * @param mixed $serverId
     * @param int   $scheduleId
     *
     * @return void
     */
    public function run($serverId, int $scheduleId)
    {
        return $this->http->post("servers/$serverId/schedules/$scheduleId/run");
    }

    /**
     * Create a task on the given schedule.
     *
     * @param mixed $serverId
     * @param int   $scheduleId
     * @param array $data
     *
     * @return ScheduleTask
     */
    public function createTask($serverId, int $scheduleId, array $data)
    {
        return $this->http->post("servers/$serverId/schedules/$scheduleId/tasks", [], $data);
    }

    /**
     * Update a task on the given schedule.
     *
     * @param mixed $serverId
     * @param int   $scheduleId
     * @param int   $taskId
     * @param array $data
     *
     * @return ScheduleTask
     */
    public function updateTask($serverId, int $scheduleId, int $taskId, array $data)
    {
        return $this->http->put("servers/$serverId/schedules/$scheduleId/tasks/$taskId", [], $data);
    }

    /**
     * Delete a task from the given schedule.
     *
     * @param mixed $serverId
     * @param int   $scheduleId
     * @param int   $taskId
     *
     * @return void
     */
    public function deleteTask($serverId, int $scheduleId, int $taskId)
    {
        return $this->http->delete("servers/$serverId/schedules/$scheduleId/tasks/$taskId");
    }
}
