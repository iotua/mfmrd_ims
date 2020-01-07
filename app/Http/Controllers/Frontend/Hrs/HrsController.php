<?php

namespace App\Http\Controllers\Frontend\Hrs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Models\Hrs;
use Carbon\Carbon;

class HrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Hrs::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="' . route('frontend.stafflist.show', $data->id) .'">View </a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="stafflist/update">Update </a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('frontend.hrs.index');

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.hrs.create');
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
        $image->move(public_path('images/hrs'), $new_name);
        
        //											

        Hrs::updateOrCreate(['id' => $request->id],
                ['division' => $request->division, 'fullname' => $request->fullname, 'posttitle' => $request->posttitle,'photolocation' => $new_name,
                'salarylevel' => $request->salarylevel, 'cursalarylevel' => $request->cursalarylevel,'dateofappointment' => $request->dateofappointment,
                'dataofbirth' => $request->dateofbirth,'gender' => $request->gender,'appointmenttype' => $request->appointmenttype,
                'qualification' => $request->qualification,'program' => $request->program,'pfnumber' => $request->pfnumber]);      
                
   
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
        $data = Hrs::find($id);          
        $data->age=Carbon::parse($data->dataofbirth)->age;  

        //$data->leaves->total=5;
        
        


        return view('frontend.hrs.view', compact('data')); 
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
