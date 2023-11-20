<?php

namespace App\Services;
use App\Contracts\Dao\TaskDaoInterface;
use App\Contracts\Services\TaskServiceInterface;
class TaskService implements TaskServiceInterface
{
    private $taskDao;
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }
    public function getAllTasks()
    {
       $result = $this->taskDao->getAll();
        return $result;
    }

    public function createTask(array $data)
    {
        $result = $this->taskDao->create($data);
        return $result;
    }
    public function deleteTask($id)
    {
        $result = $this->taskDao->delete($id);
        return $result;
    }
}
