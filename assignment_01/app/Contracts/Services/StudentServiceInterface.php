<?php

namespace App\Contracts\Services;

interface StudentServiceInterface
{
    public function getAllStudents();

    public function getAllMajors();

    public function create(array $data);

    public function destroy(int $id);

    public function getStudentById(int $id);

    public function update(array $data, int $id);
}
