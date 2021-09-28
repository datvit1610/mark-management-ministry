<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $subjects = Subject::where('nameSubject', 'like', "%$search%")->orderBy('idSubject', 'asc')->paginate(5);
        return view('subject.index', [
            "subjects" => $subjects,
            "search" => $search,
        ]);
        //oderBy

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameSubject = $request->get('nameSubject');
        $final = $request->get('final');
        $skill = $request->get('skill');
        $duration = $request->get('duration');
        $subject = new Subject();
        $subject->nameSubject = $nameSubject;
        $subject->final = $final;
        $subject->skill = $skill;
        $subject->duration = $duration;
        $subject->save();
        return Redirect::route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return view('subject.edit', [
            "subject" => $subject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subject.edit', [
            "subject" => $subject
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
        $subject = Subject::find($id);
        $subject->nameSubject = $request->get('nameSubject');
        $subject->final = $request->get('final');
        $subject->skill = $request->get('skill');
        $subject->duration = $request->get('duration');
        $subject->save();
        return Redirect::route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return Redirect::route('subject.index');
    }
}
