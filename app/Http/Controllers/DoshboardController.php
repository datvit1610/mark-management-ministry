<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoshboardController extends Controller
{
    public function doshboard()
    {
        $course = Course::count();
        $major = Major::count();
        $grade = Grade::count();
        $student = Student::count();
        $subject = Subject::count();

        // $courses = DB::table('course')->count();
        // $majors = DB::table('major')->count();
        // $grades = DB::table('grade')->count();
        // $students = DB::table('student')->count();
        // $subjects = DB::table('subject')->count();

        return view('doshboard.index', [
            "course" => $course,
            "major" => $major,
            "grade" => $grade,
            "student" => $student,
            "subject" => $subject
        ]);
    }
}
