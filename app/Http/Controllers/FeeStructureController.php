<?php

namespace App\Http\Controllers;

use App\Course;
use App\FeeStructure;
use App\Level;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        $courses = Course::all();
        $levels = Level::all();

        $feeStructures = DB::table('fee_structures')
                                ->join('semesters', 'fee_structures.semester_id', '=', 'semesters.id')
                                ->join('courses', 'fee_structures.course_id', '=', 'courses.id')
                                ->join('levels', 'fee_structures.level_id', '=', 'levels.id')
                                ->select('fee_structures.*', 'semesters.semester_name', 'courses.course_name', 'levels.level')
                                //->get();
                                ->simplePaginate(2);

        return view('admin.fee_structure.index', compact('semesters', 'courses', 'levels', 'feeStructures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'semester_name' => 'required',
            'course_name' => 'required',
            'level' => 'required',
            'admissionFee' => 'required|numeric',
            'semesterFee' => 'required|numeric',
        ]);

        $feeStructure = new FeeStructure();
        $feeStructure->semester_id = $request->semester_name;
        $feeStructure->course_id = $request->course_name;
        $feeStructure->level_id = $request->level;
        $feeStructure->admissionFee = $request->admissionFee;
        $feeStructure->semesterFee = $request->semesterFee;
        if(isset($request->status))
        {
            $feeStructure->status = 'enable';
        } else {
            $feeStructure->status = 'disable';
        }

        $feeStructure->save();

        return Redirect::back()->with('successMsg', 'Fee Structure Created Successfully!');

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
        $semesters = Semester::all();
        $courses = Course::all();
        $levels = Level::all();
        $feeStructure = FeeStructure::findOrFail($id);
        return view('admin.fee_structure.edit', compact('semesters', 'courses', 'levels', 'feeStructure'));
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
            'semester_name' => 'required',
            'course_name' => 'required',
            'level' => 'required',
            'admissionFee' => 'required|numeric',
            'semesterFee' => 'required|numeric',
        ]);

        $feeStructure = FeeStructure::findOrFail($id);
        $feeStructure->semester_id = $request->semester_name;
        $feeStructure->course_id = $request->course_name;
        $feeStructure->level_id = $request->level;
        $feeStructure->admissionFee = $request->admissionFee;
        $feeStructure->semesterFee = $request->semesterFee;
        if(isset($request->status))
        {
            $feeStructure->status = 'enable';
        } else {
            $feeStructure->status = 'disable';
        }

        $feeStructure->save();

        return Redirect::to('/feestructure')->with('successMsg', 'Fee Structure Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeStructure = FeeStructure::findOrFail($id);
        $feeStructure->delete();
        return Redirect::to('/feestructure')->with('successMsg', 'Fee Structure Deleted Successfully ):');
    }

    public function dynamicLevels(Request $request)
    {
        if ($request->ajax())
        {
            return response(Level::where('course_id', $request->course_id)->get());
        }
    }

    public function unactive_feestructure($id)
    {
        $unactive_feestructure = FeeStructure::findOrFail($id);
        $unactive_feestructure->update(['status' => 'disable']);
        return Redirect::to('/feestructure')->with('successMsg', 'Fee Structure Un-activated Successfully ):');
    }

    public function active_feestructure($id)
    {
        $active_feestructure = FeeStructure::findOrFail($id);
        $active_feestructure->update(['status' => 'enable']);
        return Redirect::to('/feestructure')->with('successMsg', 'Fee Structure Activated Successfully ):');
    }

}
