<?php

namespace App\Http\Controllers;

use App\Academic;
use App\Classes;
use App\ProspectiveStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        if(isset($request->status))
        {
            $academic->status = 'enable';
        } else {
            $academic->status = 'disable';
        }

        $academic->save();

        return redirect()->route('academic.index')->with('success', 'Academic Saved Successfully!');

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
        if(isset($request->status))
        {
            $academic->status = 'enable';
        } else {
            $academic->status = 'disable';
        }

        $academic->save();
        return redirect()->route('academic.index')->with('success', 'Academic Updated Successfully!');
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
        return redirect()->route('academic.index')->with('success', 'Academic Deleted Successfully!');
    }

    public function unactive_academic($id)
    {
        $unactive_academic = Academic::findOrFail($id);
        $unactive_academic->update(['status' => 'disable']);
        return Redirect::back()->with('success', 'Academic Un-activated Successfully ):');
        // return Redirect::to('/academic.index')->with('success', 'Academic Un-activated Successfully ):');
    }

    public function active_academic($id)
    {
        $active_academic = Academic::findOrFail($id);
        $active_academic->update(['status' => 'enable']);
        return Redirect::back()->with('success', 'Academic Activated Successfully ):');
        // return Redirect::to('/academic.index')->with('successMsg', 'Academic Activated Successfully ):');
    }

}
