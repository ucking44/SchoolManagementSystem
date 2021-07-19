<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::simplePaginate(4);
        return view('admin.batch.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.batch.create');
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
            'batch' => 'required',
        ]);

        $batch = new Batch();
        $batch->batch = $request->batch;
        if(isset($request->status))
        {
            $batch->status = 'enable';
        } else {
            $batch->status = 'disable';
        }

        $batch->save();
        return redirect()->route('batch.index')->with('successMsg', 'Batch Saved Successfully!');
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
        $batch = Batch::findOrFail($id);
        return view('admin.batch.edit', compact('batch'));
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
            'batch' => 'required',
        ]);

        $batch = Batch::findOrFail($id);
        $batch->batch = $request->batch;
        if(isset($request->status))
        {
            $batch->status = 'enable';
        } else {
            $batch->status = 'disable';
        }

        $batch->save();
        return redirect()->route('batch.index')->with('successMsg', 'Batch Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::findOrFail($id);
        $batch->delete();
        return redirect()->route('batch.index')->with('successMsg', 'Batch Deleted Successfully!');
    }

    public function unactive_batch($id)
    {
        $unactive_batch = Batch::findOrFail($id);
        $unactive_batch->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Batch Un-activated Successfully ):');
        // return Redirect::to('/batch.index')->with('successMsg', 'Batch Un-activated Successfully ):');
    }

    public function active_batch($id)
    {
        $active_batch = Batch::findOrFail($id);
        $active_batch->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Batch Activated Successfully ):');
        // return Redirect::to('/batch.index')->with('successMsg', 'Batch Activated Successfully ):');
    }

}
