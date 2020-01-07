<?php

namespace App\Http\Controllers\Frontend\Mrs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Models\Mrs;

class MrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            return datatables()->of(Mrs::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<a href="' . route('frontend.in.show', $data->id) .'">View </a>';
                        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('frontend.mrs.in.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         
        return view('frontend.mrs.in.create');
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
        //$new_name=NULL;
        //$image=NULL;
       if ($image != NULL){
        
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/mrs'), $new_name);
       
        
        Mrs::updateOrCreate(['id' => $request->id],
                ['date' => $request->date, 'mailsubject' => $request->mailsubject, 'letterdated' => $request->letterdated,'sender' => $request->sender,
                'department' => $request->department, 'codenumber' => $request->codenumber,'concernofficer' => $request->concernofficer,
                'letterurl' => $new_name,'action' => $request->actions]);      
                
            }
            else{
                Mrs::updateOrCreate(['id' => $request->id],
                ['date' => $request->date, 'mailsubject' => $request->mailsubject, 'letterdated' => $request->letterdated,'sender' => $request->sender,
                'department' => $request->department, 'codenumber' => $request->codenumber,'concernofficer' => $request->concernofficer,
                'letterurl' => $request->image,'action' => $request->actions]); 
            }


        //return response()->json(['success'=>'Mail recorded successfully.']);
        return view('frontend.mrs.in.index')->with('success','Email created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mrs::find($id);        
        return view('frontend.mrs.in.view', compact('data')); 

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
            $data = Mrs::findOrFail($id);
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
        //$image_name = $request->hidden_image;
        //$image = $request->file('image');

        
        Mrs::updateOrCreate(['id' => $request->hidden_id],
               ['concernofficer' => $request->concernofficer
               ]);  


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
        $data = Mrs::findOrFail($id);
        $data->delete();
        
    }
}
