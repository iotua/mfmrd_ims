@extends('frontend.layouts.app')

@section('content')  
<h1>New Maternity Leave details </h1>

<form action="{{ route('frontend.maternity.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<input type="hidden" name="hrs_id" id="hrs_id" value={{request()->route('id')}}>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Start Date</label>
        <div class="col-sm-12">
            <input type="date" class="form-control" id="startdate" name="startdate"   required>
        </div>
    </div>     

    <div class="form-group">
        <label class="col-sm-2 control-label">End Date:</label>
        <div class="col-sm-12">
            <input type="date" class="form-control" id="enddate" name="enddate"  required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">No of Days:</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="nofofdays" name="nofofdays"  required>
        </div>
    </div>

    

    <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" id="saveBtn" value="create">Save changes
            </button>&nbsp;&nbsp;
            <a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
            </div>
</form>
@endsection