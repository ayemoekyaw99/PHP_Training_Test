<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Http\Requests\StudentRequest;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;

class ExcelController extends Controller
{


    /**
     * @return \Illuminate\Support\Collection
     */
    // public function import() 
    // {
    //     Excel::import(new StudentImport, 'student.xlsx');
    // }
    // /**
    public function import()
    {
        Excel::import(new StudentImport, request()->file('file'));
        return back();
    }

    // * @return \Illuminate\Support\Collection
    // */
    public function export()
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }
}