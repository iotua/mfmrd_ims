@extends('frontend.layouts.app')
@section('content')
    <div class="col-sm-12">

        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div>
        @endif
      </div>

      <div class="pull-left">
        <h2> Details of Incoming Mail</h2>
    </div>
    
    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            
            <tr>
                <th>Date</th>
                <td>{{ date('d-m-Y', strtotime( $data->date )) }}</td>
            </tr>
            <tr>
                <th>Mail Subject</th>
                <td>{{ $data->mailsubject }}</td>
            </tr>
            <tr>
                <th>Letter dated</th>
                <td>{{ $data->letterdated }}</td>
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
                <th>Actions</th>
                <td>{{ $data->actions }}</td>
            </tr>
            <tr>
                <th>Scanned letter</th>
                <td><a href="/images/{{ $data->letterurl }}">Download/View</a></td>
            </tr>         
           
        </table>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('frontend.mrs.index') }}"> Back</a>
                &nbsp;&nbsp;
                <a class="btn btn-success" href="{{ route('frontend.mrs.update') }}"> Update</a>
                
            </div>
            
        </div>
    </div>
   <br/>

@endsection