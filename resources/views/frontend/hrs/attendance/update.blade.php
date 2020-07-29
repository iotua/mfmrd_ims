@extends('frontend.layouts.app')

@section('content')  
<h1>Update Attendance Information </h1>

<form action="{{ route('frontend.attendance.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<input type="hidden" name="hrs_id" id="hrs_id" value={{request()->route('id')}}>
<input type="hidden" name="id" id="id" value={{$data->id}}>

    <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Date {{request()->route('id')}}</label>
        <div class="col-sm-12">
        <input type="date" class="form-control" id="date" name="date" value="{{$data->date}}"  disabled required="">
        </div>
    </div>    

    <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Punch In </label>
        <div class="col-sm-12">
        <input type="text" class="form-control" id="punchin" name="punchin" value="{{$data->punch_in}}"   required="">
        </div>
    </div>     

    <div class="form-group">
        <label class="col-sm-2 control-label">Punch Out:</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="punchout" name="punchout"  value="{{$data->punch_out}}"  required="">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Remark:</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="remark" name="remark" value="{{$data->remark}}" required="">
        </div>
    </div>

    <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" id="saveBtn" value="create">Save changes
            </button>&nbsp;&nbsp;
            <a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
            </div>
</form>
@endsection