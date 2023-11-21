<?php

namespace App\Services;

use App\Contracts\Dao\StudentDaoInterface;
use App\Contracts\Services\StudentServiceInterface;

class StudentService implements StudentServiceInterface
{
    private $studentDao;
    /**
     * Constructor function
     *
     * @param StudentDaoInterface $formDao
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * sample function
     *
     * @return string
     */
    public function getAllStudents()
    {
        $result = $this->studentDao->getAllStudents();
        return $result;
    }

    /**
     * sample function
     *
     * @return string
     */
    public function getAllMajors()
    {
        $result = $this->studentDao->getAllMajors();
        return $result;
    }


    /**
     * sample function
     *
     * @return void
     */
    public function create(array $data)
    {
        $this->studentDao->create($data);
    }

    /**
     * sample function
     *
     * @return void
     */
    public function destroy(int $id)
    {
         $this->studentDao->destroy($id);
    }

    /**
     * sample function
     *
     * @return string
     */
    public function getStudentById(int $id)
    {
        return $this->studentDao->find($id);

    }

    /**
     * sample function
     *
     * @return string
     */

    public function update(array $data, int $id)
    {
        return $this->studentDao->update($data, $id);
    }
}