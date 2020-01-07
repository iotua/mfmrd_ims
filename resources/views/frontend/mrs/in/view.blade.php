@extends('frontend.layouts.app')

@section('content')  
<h1>Update Mail details</h1>


<div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            
            <tr>
                <th>Received on</th>
                <td>{{ date('d-m-Y', strtotime( $data->date )) }}</td>
            </tr>
            <tr>
                <th>Mail Subject</th>
                <td>{{ $data->mailsubject }}</td>
            </tr>
            <tr>
                <th>Letter dated</th>
                <td>{{ date('d-m-Y', strtotime( $data->letterdated )) }}</td>
            </tr>
            <tr>
                <th>Sender</th>
                <td>{{ $data->sender }}</td>
            </tr>
            <tr>
                <th>Department</th>
                <td>{{ $data->department }}</td>
            </tr>
            <tr>
                <th>File ref</th>
                <td>{{ $data->codenumber }}</td>
            </tr>
            <tr>
                <th>Concern Officer</th>
                <td>{{ $data->concernofficer }}</td>
            </tr>
            
            <tr>
                <th>Scanned letter</th>
                <td><a href="/images/mrs/{{ $data->letterurl }}">Download/View</a></td>
            </tr>  
            @if($data->concernofficer != NULL)
            <tr>
                    <th>Status </th>
                    <td>Submitted to {{ $data->concernofficer }} on {{ date('d-m-Y @ H:i', strtotime( $data->updated_at )) }}</td>
                </tr>
            @endif      
           
        </table>
    </div>
    
    <h2>Actions</h2>
    @if($data->concernofficer == NULL)
    <form action="{{ route('frontend.in.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" id="date" name="date" value={{$data->date}}>
        <input type="hidden" id="mailsubject" name="mailsubject" value={{$data->mailsubject}}>
        <input type="hidden" id="letterdated" name="letterdated" value={{$data->letterdated}}>
        <input type="hidden" id="sender" name="sender" value={{$data->sender}}>
        <input type="hidden" id="department" name="department" value={{$data->department}}>
        <input type="hidden" id="codenumber" name="codenumber" value={{$data->codenumber}}>
        <input type="hidden" id="image" name="image" value={{$data->letterurl}}>
        <div class="form-group">
                <label class="col-sm-2 control-label">Conncern Officer:</label>        
                        <div class="col-sm-12">        
                            <input type="text" class="form-control" id="concernofficer" name="concernofficer" placeholder="Enter concern officer" value="" maxlength="50" required="">        
                        </div>        
        </div>
        <div class="col-sm-offset-2 col-sm-10">
           
                <button type="submit" class="btn btn-success" id="saveBtn" value="create">Save changes
                </button>&nbsp;&nbsp;
                <a class="btn btn-primary" href="{{ route('frontend.in.index') }}"> Back</a>
                </div>
   <br/>
    </form>
    @else
     <h3>No Action needed</h3>
     <a class="btn btn-primary" href="{{ route('frontend.in.index') }}"> Back</a>
                </div>
    @endif 

@endsection