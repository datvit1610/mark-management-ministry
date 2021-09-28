<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        //$courses = Course::orderBy('idCourse', 'asc')->get();
        $courses = Course::where('nameCourse', 'like', "%$search%")->orderBy('idCourse', 'asc')->paginate(3);
        return view('course.index', [
            "courses" => $courses,
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
        return view("course.create");
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
            $name = $request->get('name');
            $course = new Course();
            $course->nameCourse = $name;
            $course->save();
            return Redirect::route('course.index');
        } catch (Exception $e) {
            return Redirect::route('course.create')->with('error', [
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
        $course = Course::find($id);
        return $course;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('course.edit', [
            "course" => $course
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
        $course = Course::find($id);
        $course->nameCourse = $request->get('name');
        $course->save();
        return Redirect::route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return Redirect::route('course.index');
    }
}
