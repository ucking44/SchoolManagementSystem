<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $days = Day::simplePaginate(3);
        $days = Day::all();
        return view('admin.day.index', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.day.create');
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
            'day_name' => 'required',
        ]);

        $day = new Day();
        $day->day_name = $request->day_name;
        if(isset($request->status))
        {
            $day->status = 'enable';
        } else {
            $day->status = 'disable';
        }

        $day->save();
        return redirect()->route('day.index')->with('successMsg', 'Day Saved Successfully!');
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
    public function edit($day)
    {
        $day = Day::findOrFail($day);
        return view('admin.day.edit', compact('day'));
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
            'day_name' => 'required',
        ]);

        $day = Day::findOrFail($id);
        $day->day_name = $request->day_name;
        if(isset($request->status))
        {
            $day->status = 'enable';
        } else {
            $day->status = 'disable';
        }

        $day->save();
        return redirect()->route('day.index')->with('successMsg', 'Day Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $day = Day::findOrFail($id);
        $day->delete();
        return redirect()->route('day.index')->with('successMsg', 'Day Deleted Successfully!');
    }

    public function unactive_day($id)
    {
        $unactive_day = Day::findOrFail($id);
        $unactive_day->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Day Un-activated Successfully ):');
        // return Redirect::to('/day.index')->with('successMsg', 'Day Un-activated Successfully ):');
    }

    public function active_day($id)
    {
        $active_day = Day::findOrFail($id);
        $active_day->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Day Activated Successfully ):');
        // return Redirect::to('/day.index')->with('successMsg', 'Day Activated Successfully ):');
    }

}
