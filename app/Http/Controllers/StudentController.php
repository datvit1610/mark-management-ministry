<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;
use Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grades = Grade::all();
        $grade = $request->get('grade');
        $students = Student::where('idGrade', $grade)->get();
        // dd($students);
        return view('student.index', [
            'idGrade' => $grade,
            'grades' => $grades,
            'students' => $students

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lop = Grade::all();
        $grades = DB::table('student')
            ->join('grade', 'student.idGrade', '=', 'grade.idGrade')
            ->select(
                'student.idGrade',
                'grade.nameGrade'
            )->get();
        return view("student.create", [
            "grades" => $grades,
            "lop" => $lop
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $lastName = $request->get('lastName');
            $firstName = $request->get('firstName');
            $email = $request->get('email');
            $passWord = $request->get('passWord');
            $DoB = $request->get('DoB');
            $gender = $request->get('gender');
            $idGrade = $request->get('idGrade');

            $student = new Student();
            $student->lastName = $lastName;
            $student->firstName = $firstName;
            $student->email = $email;
            $student->passWord = $passWord;
            $student->DoB = $DoB;
            $student->gender = $gender;
            $student->idGrade = $idGrade;
            $student->save();
            return Redirect::route('student.index');
        } catch (Exception $e) {
            return Redirect::route('student.create')->with('error', [
                "message" => "Hãy điền đủ các trường dữ liệu !",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lop = Grade::all();
        $student = Student::find($id);
        $students = DB::table('student')
            ->join('grade', 'student.idGrade', '=', 'grade.idGrade')
            ->select(
                'student.*',
                'grade.nameGrade'
            )->get();
        return view('student.edit', [
            "student" => $student,
            "students" => $students,
            "lop" => $lop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $student = Student::find($id);
            $student->lastName = $request->get('lastName');
            $student->firstName = $request->get('firstName');
            $student->email = $request->get('email');
            $student->DoB = $request->get('DoB');
            $student->gender = $request->get('gender');
            $student->idGrade = $request->get('idGrade');
            $student->save();
            return Redirect::route('student.index');
        } catch (Exception $e) {
            return Redirect::route('student.edit')->with('error', [
                "message" => "Hãy điền đủ các trường dữ liệu !",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Student::find($id)->delete();
        // return Redirect::route('student.index');
    }

    public function addByExcel()
    {
        return view('student.add-by-excel');
    }

    public function import(Request $request)
    {
        $file = $request->file('excel-file');

        Excel::import(new StudentImport, $file);

        return Redirect::route('student.index');
    }
}
