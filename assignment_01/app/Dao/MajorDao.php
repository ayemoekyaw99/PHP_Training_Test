<?php

namespace App\Dao;

use App\Contracts\Dao\MajorDaoInterface;
use App\Models\Major;

class MajorDao implements MajorDaoInterface
{
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
     * Major create

     * @param mixed $data
     * @return void
     */
    public function create(array $data): void
    {
        Major::create($data);
    }

    /**
     * Summary of destroy
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Major::destroy($id);
    }

    /**
     * sample function
     *
     * @return string
     */
    public function find($id)
    {
        return Major::find($id);
    }


    /**
  * Major update

  * @param mixed $data
  * @return void
  */
    public function update(array $data, int $id): void
    {
        $major = Major::find($id);
        $major->update($data);

    }
}
