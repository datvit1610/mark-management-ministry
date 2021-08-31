<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mockery\Matcher\Subset;

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
        $search = $request->get('search');
        $marks = DB::table('mark')
            ->join('student', 'mark.idStudent', '=', 'student.idStudent')
            ->join('subject', 'mark.idSubject', '=', 'subject.idSubject')
            ->select('mark.*', 'student.lastName', 'student.firstName', 'subject.nameSubject', 'subject.final', 'subject.skill')
            ->where('subject.nameSubject', 'like', "%$search%")
            ->paginate(10);

        // $grades = Grade::where('nameGrade', 'like', "%$search%");
        // DB::enableQueryLog();    
        return view('mark.index', [
            "idStudent" => $idStudent,
            'marks' => $marks,
            "search" => $search
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // $mark = Mark::find($id);
        // $student = Student::findOrFail($student->idStudent);
        // $subject = Subject::findOrFail($subject->idSubject);
        // return view('student.subject.edit', compact('student', 'subject'));
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
        // $mark = Mark::find($idStudent, $idSubject);
        // $mark->final1 = $request->get('final1');
        // $mark->final2 = $request->get('final2');
        // $mark->skill1 = $request->get('skill1');
        // $mark->skill2 = $request->get('skill2');
        // $mark->save();
        // return Redirect::route('mark.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        // $mark = new Mark;
        // dd($request);
        // $idStudent = $request->get('idStudent');
        // $idSubject = $request->get('idSubject');

        // $mark = Mark::find($idStudent, $idSubject);
        // $mark->final1 = $request->get('final1');
        // $mark->final2 = $request->get('final2');
        // $mark->skill1 = $request->get('skill1');
        // $mark->skill2 = $request->get('skill2');
        // $mark->save();
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
}
