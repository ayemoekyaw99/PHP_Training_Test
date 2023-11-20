<?php

namespace App\Dao;

use App\Contracts\Dao\TaskDaoInterface;
use App\Models\Task;

class TaskDao implements TaskDaoInterface
{
    /**
     * sample function
     *
     * @return string
     */
    public function getAll()
    {
        return Task::all();
    }

    /**
     * create function
     * @return void
     */
    public function create(array $data): void
    {
        Task::create($data);
    }

    /**
     * create function
     * @return void
     */
    public function delete(int $id)
    {
        Task::destroy($id);
    }
}