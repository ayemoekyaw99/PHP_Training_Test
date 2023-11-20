<?php

namespace App\Contracts\Services;

interface TaskServiceInterface
{
    public function getAllTasks();
    public function createTask(array $data);
    public function deleteTask(int $id);
}