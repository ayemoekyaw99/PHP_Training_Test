<?php

namespace App\Contracts\Dao;

interface StudentDaoInterface
{
    public function getAllStudents();
    public function getAllMajors();
    public function create(array $data);
    public function destroy(int $id);
    public function find(int $id);
    public function update(array $data, int $id);
}