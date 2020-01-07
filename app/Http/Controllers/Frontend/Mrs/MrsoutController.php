<?php

namespace App\Http\Controllers\Frontend\Mrs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Datatables;
use App\Models\Mrsout;

class MrsoutController extends Controller
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
            return datatables()->of(Mrsout::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="' . route('frontend.out.show', $data->id) .'">View </a>';
                        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('frontend.mrs.out.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.mrs.out.create');
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
        $image->move(public_path('images/mrs'), $new_name);
        
        Mrsout::updateOrCreate(['id' => $request->id],
                ['date' => $request->date, 'mailsubject' => $request->mailsubject, 'letterdated' => $request->letterdated,'sender' => $request->sender,
                'department' => $request->department, 'codenumber' => $request->codenumber,'concernofficer' => $request->concernofficer,
                'letterurl' => $new_name,'ministry' => $request->ministry]);      
                
   
        //return response()->json(['success'=>'Mail recorded successfully.']);
        return view('frontend.mrs.out.index')->with('success','Email created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mrsout::find($id);        
        return view('frontend.mrs.out.view', compact('data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Mrsout::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        
        Mrsout::updateOrCreate(['id' => $request->hidden_id],
               ['date' => $request->date, 'mailsubject' => $request->mailsubject, 'letterdated' => $request->letterdated,'sender' => $request->sender,
               'department' => $request->department, 'codenumber' => $request->codenumber,'concernofficer' => $request->concernofficer,
               'letterurl' => $image_name ,'ministry' => $request->ministry]);  


        return response()->json(['success' => 'Mail information updated successfully']);
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
