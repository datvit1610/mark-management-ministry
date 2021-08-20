<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        // $grades = Grade::where('nameGrade', 'like', "%$search%");
        // DB::enableQueryLog();
        $grade = DB::table('grade')
            ->join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->join('major', 'grade.idMajor', '=', 'major.idMajor')
            ->select(
                'grade.*',
                'course.nameCourse',
                'major.nameMajor'
            )
            ->where('grade.nameGrade', 'like', "%$search%")
            ->paginate(3);
        // dd(DB::getQueryLog());
        return view('grade.index', [
            // "grades" => $grades,
            "grade" => $grade,
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
        $grades = DB::table('grade')
            ->join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->join('major', 'grade.idMajor', '=', 'major.idMajor')
            ->select(
                'grade.*',
                'course.nameCourse',
                'major.nameMajor'
            )->get();
        return view("grade.create", [
            "grades" => $grades
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
        $nameGrade = $request->get('nameGrade');
        $idCourse = $request->get('idCourse');
        $idMajor = $request->get('idMajor');
        $grade = new Grade();
        $grade->nameGrade = $nameGrade;
        $grade->idCourse = $idCourse;
        $grade->idMajor = $idMajor;
        $grade->save();
        return Redirect::route('grade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = Grade::find($id);
        return $grade;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        return view('grade.edit', [
            "grade" => $grade
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
        $grade = Grade::find($id);
        $grade->nameGrade = $request->get('name');
        $grade->save();
        return Redirect::route('grade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::find($id)->delete();
        return Redirect::route('grade.index');
    }
}
