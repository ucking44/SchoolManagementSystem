<?php

namespace App\Http\Controllers;

use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::all();
        return view('admin.shift.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shift.create');
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
            'shift' => 'required',
        ]);

        $shift = new Shift();
        $shift->shift = $request->shift;
        if(isset($request->status))
        {
            $shift->status = 'enable';
        } else {
            $shift->status = 'disable';
        }

        $shift->save();
        return redirect()->route('shift.index')->with('successMsg', 'Shift Saved Successfully!');
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
        $shift = Shift::findOrFail($id);
        return view('admin.shift.edit', compact('shift'));
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
            'shift' => 'required',
        ]);

        $shift = Shift::findOrFail($id);
        $shift->shift = $request->shift;
        if(isset($request->status))
        {
            $shift->status = 'enable';
        } else {
            $shift->status = 'disable';
        }

        $shift->save();
        return redirect()->route('shift.index')->with('successMsg', 'Shift Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();
        return redirect()->route('shift.index')->with('successMsg', 'Shift Deleted Successfully!');
    }

    public function unactive_shift($id)
    {
        $unactive_shift = Shift::findOrFail($id);
        $unactive_shift->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Shift Un-activated Successfully ):');
        // return Redirect::to('/shift.index')->with('successMsg', 'Shift Un-activated Successfully ):');
    }

    public function active_shift($id)
    {
        $active_shift = Shift::findOrFail($id);
        $active_shift->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Shift Activated Successfully ):');
        // return Redirect::to('/shift.index')->with('successMsg', 'Shift Activated Successfully ):');
    }

}
