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
    public function create(array $data)
    {
        return Task::create($data);
    }
    public function delete($id){
        return Task::destroy($id);
    }
}