<?php

namespace App\Dao;

use App\Contracts\Dao\StudentDaoInterface;
use App\Models\Student;
use App\Models\Major;

class StudentDao implements StudentDaoInterface
{
    /**
     * sample function
     *
     * @return string
     */
    public function getAllStudents()
    {
        return Student::all();
    }

    /**
     * sample function
     *
     * @return string
     */
    public function getAllMajors()
    {
        return Major::all();
    }

    /**
     * Student create

     * @param mixed $data
     * @return void
     */
    public function create(array $data): void
    {
        Student::create($data);
    }

    /**
     * Summary of destroy
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Student::destroy($id);
    }

    /**
     * sample function
     *
     * @return string
     */
    public function find($id)
    {
        return Student::find($id);
    }

    /**
   * Student update

   * @param mixed $data
   * @return void
   */
    public function update(array $data, int $id): void
    {
        Student::where('id', $id)->update($data);
    }
}