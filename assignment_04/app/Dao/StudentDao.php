<?php

namespace App\Dao;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\StudentDaoInterface;

class StudentDao implements StudentDaoInterface
{
    /**
     * sample function
     *
     * @return string
     */
    public function getAllStudents()
    {
        return Student::select('students.*')
            ->leftJoin('majors', 'students.major_id', 'majors.id')
            ->when(request('searchKey'), function ($query) {
                $key = request('searchKey');
                $query->where('students.name', 'like', '%' . $key . '%')
                    ->orWhere('students.email', '=', $key)
                    ->orWhere('students.phone', '=', $key)
                    ->orWhere('students.address', 'like', '%' . $key . '%')
                    ->orWhere('majors.name', 'like', '%' . $key . '%');
            })->get();

        //   $students = DB::table('students')
        //        ->leftJoin('majors', 'students.major_id', '=', 'majors.id')
        //        ->when(request('searchKey'),function($query){
        //                        $key=request('searchKey');
        //                       $query->where('students.name', 'like', '%' . $key . '%')
        //                           ->orWhere('students.email', '=', $key)
        //                           ->orWhere('students.phone', '=', $key)
        //                           ->orWhere('students.address', 'like', '%' . $key . '%')
        //                            ->orWhere('majors.name', 'like', '%' . $key . '%');
        //                    })->get();
        //        return $students;
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
        $student = Student::find($id);
        $student->update($data);
    }
}