<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MinistryCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $ministrys = Ministry::where('nameMinistry', 'like', "%$search%")->orderBy('idMinistry', 'asc')->paginate(3);
        return view('ministry.index', [
            "ministrys" => $ministrys,
            "search" => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ministry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $passWord = $request->get('passWord');
        $phone = $request->get('phone');
        $role = $request->get('role');
        $block = $request->get('block');
        $ministry = new Ministry();
        $ministry->nameMinistry = $name;
        $ministry->email = $email;
        $ministry->passWord = $passWord;
        $ministry->phone = $phone;
        $ministry->role = $role;
        $ministry->block = $block;
        $ministry->save();
        return Redirect::route('ministry.index');
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
    public function edit($id)
    {
        $ministry = Ministry::find($id);
        return view('ministry.edit', [
            "ministry" => $ministry
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
        $ministry = Ministry::find($id);
        $ministry->nameMinistry = $request->get('name');
        $ministry->email = $request->get('email');
        $ministry->passWord = $request->get('passWord');
        $ministry->phone = $request->get('phone');
        $ministry->role = $request->get('role');
        $ministry->block = $request->get('block');
        $ministry->save();
        return Redirect::route('ministry.index');
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
}
