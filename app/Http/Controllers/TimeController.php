<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::all();
        return view('admin.time.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.time.create');
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
            'time' => 'required',
        ]);

        $time = new Time();
        $time->time = $request->time;
        if(isset($request->status))
        {
            $time->status = 'enable';
        } else {
            $time->status = 'disable';
        }

        $time->save();
        return redirect()->route('time.index')->with('successMsg', 'Time Saved Successfully!');

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
        $time = Time::findOrFail($id);
        return view('admin.time.edit', compact('time'));
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
            'time' => 'required',
        ]);

        $time = Time::findOrFail($id);
        $time->time = $request->time;
        if(isset($request->status))
        {
            $time->status = 'enable';
        } else {
            $time->status = 'disable';
        }

        $time->save();
        return redirect()->route('time.index')->with('successMsg', 'Time Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Time::findOrFail($id);
        $time->delete();
        return redirect()->route('time.index')->with('successMsg', 'Time Deleted Successfully!');

    }

    public function unactive_time($id)
    {
        $unactive_time = Time::findOrFail($id);
        $unactive_time->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Time Un-activated Successfully ):');
        // return Redirect::to('/time.index')->with('successMsg', 'Time Un-activated Successfully ):');
    }

    public function active_time($id)
    {
        $active_time = Time::findOrFail($id);
        $active_time->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Time Activated Successfully ):');
        // return Redirect::to('/time.index')->with('successMsg', 'Time Activated Successfully ):');
    }

}
