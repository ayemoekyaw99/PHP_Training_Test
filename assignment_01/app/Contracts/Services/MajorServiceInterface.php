<?php

namespace App\Contracts\Services;

interface MajorServiceInterface
{
    public function getAllMajors();

    public function create(array $data);

    public function destroy(int $id);

    public function getMajorById(int $id);

    public function update(array $data, int $id);
}
