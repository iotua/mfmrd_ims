<?php

namespace App\Http\Controllers\Frontend\Sleave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sleave;


class SleaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.hrs.sick.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/sleave'), $new_name);
        
        //											

        Sleave::updateOrCreate(['id' => $request->id],
                ['hrs_id' => $request->hrs_id, 'startdate' => $request->startdate, 'enddate' => $request->enddate,'daystaken' => $request->nofofdays,
                'certificate' => $new_name]);      
                
   
        //return response()->json(['success'=>'Mail recorded successfully.']);
        return view('frontend.hrs.index')->with('success','Email created successfully');
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
        //
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
        //
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
