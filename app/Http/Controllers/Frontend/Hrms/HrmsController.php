<?php

namespace App\Http\Controllers\Frontend\Hrms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hrs;
use App\Models\Leave;
use Illuminate\Support\Arr;
use DB;
use Carbon\Carbon;

class HrmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data =[];
        $dt=now();
        
        $vacant = Hrs::where('fullname','=','vacant')->count();
        $staffno=Hrs::where('fullname','!=','vacant')->count();        
        $staffonleave = Leave::where('enddate','>',$dt)->count();
        $retire = Hrs::where('dataofbirth','!=',NULL)->count();    
        
        //$users = DB::table('hrs')->where(Carbon::parse($this->attributes['dataofbirth'])->age, '>=', 55)->count();
       //Carbon::parse()->age
  

        return view ('frontend.hrs.report.index')->with( ['staffno' => $staffno, 'vacant'=>$vacant, 'staffonleave'=>$staffonleave, 'retire'=>$retire] );
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
        //
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
