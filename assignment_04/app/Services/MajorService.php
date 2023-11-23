<?php

namespace App\Services;

use App\Contracts\Dao\MajorDaoInterface;
use App\Contracts\Services\MajorServiceInterface;

class MajorService implements MajorServiceInterface
{
    private $majorDao;

    /**
     * Constructor function
     *
     * @param MajorDaoInterface $formDao
     */
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }

    /**
     * sample function
     *
     * @return string
     */
    public function getAllMajors()
    {
        $result = $this->majorDao->getAllMajors();
        return $result;
    }

    /**
     * sample function
     *
     * @return string
     */
    public function create(array $data)
    {
      return $this->majorDao->create($data);
    }

    /**
     * sample function
     *
     * @return string
     */
    public function destroy(int $id)
    {
        $this->majorDao->destroy($id);
    }
    /**
     * sample function
     *
     * @return string
     */
    public function getMajorById(int $id)
    {
        return $this->majorDao->find($id);
    }

    /**
     * sample function
     *
     * @return string
     */
    public function update(array $data, int $id)
    {
        return $this->majorDao->update($data, $id);
    }
}