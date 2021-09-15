<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MarkImport;
use App\Models\Grade;


class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idStudent = $request->session()->get('id');
        $searchSub = $request->get('searchSub');
        $searchGra = $request->get('searchGra');
        $marks = DB::table('mark')
            ->join('student', 'mark.idStudent', '=', 'student.idStudent')
            ->join('subject', 'mark.idSubject', '=', 'subject.idSubject')
            ->join('grade', 'student.idGrade', '=', 'grade.idGrade')
            ->select('mark.*', 'student.lastName', 'student.firstName', 'grade.nameGrade',  'subject.nameSubject', 'subject.final', 'subject.skill')
            ->where('subject.nameSubject', 'like', "%$searchSub%")
            ->where('grade.nameGrade', 'like', "%$searchGra%")
            ->paginate(10);
        return view('mark.index', [
            "idStudent" => $idStudent,
            'marks' => $marks,
            "searchSub" => $searchSub,
            "searchGra" => $searchGra
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::all();
        $subject = Subject::all();
        $mark = DB::table('mark')
            ->join('student', 'mark.idStudent', '=', 'student.idStudent')
            ->join('subject', 'mark.idSubject', '=', 'subject.idSubject')
            ->select('mark.*', 'student.lastName', 'student.firstName', 'subject.nameSubject')
            ->get();
        return view('mark.create', [
            "student" => $student,
            "subject" => $subject,
            "mark" => $mark
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
            $mark = DB::table("mark")
                ->insert([
                    'idStudent' => $request->idStudent,
                    'idSubject' => $request->idSubject,
                    'final1' => $request->final1,
                    'skill1' => $request->skill1,
                ]);
            return Redirect::route('mark.index');
        } catch (Exception $e) {
            return Redirect::route('mark.create')->with('error', [
                "message" => "Môn này đã có điểm rồi !",
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idStudent, $idSubject)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function editMark($idStudent, $idSubject)
    {
        $mark = DB::table('mark')
            ->join('student', 'mark.idStudent', '=', 'student.idStudent')
            ->join('subject', 'mark.idSubject', '=', 'subject.idSubject')
            ->where('student.idStudent', $idStudent)
            ->where('subject.idSubject', $idSubject)
            ->get();

        return view('mark.edit', [
            'mark' => $mark
        ]);
    }

    public function updateMark(Request $request)
    {
        $mark = DB::table('mark')
            ->where('idStudent', $request->idStudent)
            ->where('idSubject', $request->idSubject)
            ->update([
                'final1' => $request->get('final1'),
                'final2' => $request->get('final2'),
                'skill1' => $request->get('skill1'),
                'skill2' => $request->get('skill2')
            ]);
        return Redirect::route('mark.index');
    }

    public function addByExcel()
    {
        return view('mark.add-by-excel');
    }

    public function import(Request $request)
    {
        $file = $request->file('excel-file');
        Excel::import(new MarkImport, $file);

        return Redirect::route('mark.index');
    }

    public function statisGrade(Request $request)
    {
        $search = $request->get('search');
        $grade = Grade::all();
        // $grades = Grade::where('grade.nameGrade', 'like', "%$search%");
        return view('mark.statisGrade', [
            "grade" => $grade,
            // "grades" => $grades,
            "search" => $search
        ]);
    }

    public function statisSubject(Request $request)
    {
        $grades = Grade::all();
        $idGrade = $request->get('grade');
        $grade = DB::table('grade')->where('idGrade', '=', $idGrade)->select('nameGrade');
        $subject = DB::table('subject')
            ->join('mark', 'subject.idSubject', '=', 'mark.idSubject')
            ->join('student', 'mark.idStudent', '=', 'student.idStudent')
            ->where('student.idGrade', '=', $idGrade)
            ->select('subject.idSubject', 'subject.nameSubject', 'student.idGrade')
            ->distinct()
            ->get();

        return view('mark.statisSubject', [
            "grade" => $grade,
            "grades" => $grades,
            "subject" => $subject,
            "idGrade" => $idGrade,

        ]);
    }

    public function statisMark(Request $request)
    {
        $idGrade = $request->get('idGrade');
        $idSubject = $request->get('idSubject');
        $subjects = Subject::all();
        $grades = Grade::all();
        $all = DB::table('mark')
            ->join('student', 'mark.idStudent', '=', 'student.idStudent')
            ->join('subject', 'mark.idSubject', '=', 'subject.idSubject')
            ->where('student.idGrade', '=', $idGrade)
            ->where('mark.idSubject', '=', $idSubject)
            ->count();
        $mark = DB::table('mark')
            ->join('student', 'mark.idStudent', '=', 'student.idStudent')
            ->join('subject', 'mark.idSubject', '=', 'subject.idSubject')
            ->where('student.idGrade', '=', $idGrade)
            ->where('mark.idSubject', '=', $idSubject)
            ->get();
        return view('mark.statisMark', [
            "mark" => $mark,
            "subjects" => $subjects,
            "grades" => $grades,
            "idGrade" => $idGrade,
            "idSubject" => $idSubject,
            "all" => $all
        ]);
    }
}
