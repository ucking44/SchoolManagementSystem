<?php

namespace App\Http\Controllers;

use App\Academic;
use App\Classes;
use App\ProspectiveStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academics = Academic::simplePaginate(4);
        return view('admin.academic.index', compact('academics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.academic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'academic_year' => 'required',
        ]);

        $academic = new Academic();
        $academic->academic_year = $request->academic_year;
        $academic->save();

        return redirect()->route('academic.index')->with('successMsg', 'Academic Saved Successfully!');

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
    public function edit($id)
    {
        $academic = Academic::findOrFail($id);
        return view('admin.academic.edit', compact('academic'));
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
        $this->validate($request, [
            'academic_year' => 'required',
        ]);

        $academic = Academic::findOrFail($id);
        $academic->academic_year = $request->academic_year;
        $academic->save();
        return redirect()->route('academic.index')->with('successMsg', 'Academic Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academic = Academic::findOrFail($id);
        $academic->delete();
        return redirect()->route('academic.index')->with('successMsg', 'Academic Deleted Successfully!');
    }
}
