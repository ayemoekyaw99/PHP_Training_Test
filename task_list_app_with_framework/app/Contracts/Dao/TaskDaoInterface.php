<?php

namespace App\Contracts\Dao;

interface TaskDaoInterface
{
    public function getAll();
    public function create(array $data);
    public function delete(array $data);
}