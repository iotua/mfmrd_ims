@extends('frontend.layouts.app')

@section('content')  
<h1>New Staff Information</h1>

<form action="{{ route('frontend.stafflist.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<input type="hidden" name="product_id" id="product_id">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Division</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="division" name="division"  placeholder="Division"value="" required="">
        </div>
    </div>     

    <div class="form-group">
        <label class="col-sm-2 control-label">Fullname:</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name" value="" maxlength="50" required="">
        </div>
    </div>

    <div class="form-group">
            <label class="col-sm-2 control-label">Post title</label>    
            <div class="col-sm-12">    
                <input type="text" class="form-control" id="posttitle" name="posttitle"placeholder="Post Title"  value="" required="">    
            </div>    
    </div>

     <div class="form-group">
            <label class="col-sm-2 control-label">PF Number</label>    
            <div class="col-sm-12">    
                <input type="text" class="form-control" id="pfnumber" name="pfnumber"placeholder="PF number"  value="" required="">    
            </div>    
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Salary Level</label>        
                <div class="col-sm-12">        
                    <input type="text" class="form-control" id="salarylevel" name="salarylevel" placeholder="Enter Salary Level" value="" maxlength="50" required="">        
                </div>        
    </div> 
    
    <div class="form-group">
            <label class="col-sm-2 control-label">Current Salary Level</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="cursalarylevel" name="cursalarylevel" placeholder="Current Salary Level" value="" maxlength="50" required="">        
                    </div>        
    </div>

    <div class="form-group">
            <label class="col-sm-2 control-label">Date of First Appointment:</label>        
                    <div class="col-sm-12">        
                        <input type="date" class="form-control" id="dateofappointment" name="dateofappointment" placeholder="Enter File ref" value="" maxlength="50" required="">        
                    </div>        
    </div>

     <div class="form-group">
            <label class="col-sm-2 control-label">Date of birth:</label>        
                    <div class="col-sm-12">        
                        <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" placeholder="Date of Birth" value="" maxlength="50" required="">        
                    </div>        
    </div>

     <div class="form-group">
            <label class="col-sm-2 control-label">Gender:</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" value="" maxlength="50" required="">        
                    </div>        
    </div>

    <div class="form-group">
            <label class="col-sm-2 control-label">Appointment Type:</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="appointmenttype" name="appointmenttype" placeholder="Appointment Type" value="" maxlength="50" required="">        
                    </div>        
    </div>

     <div class="form-group">
            <label class="col-sm-2 control-label">Qualification:</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification" value="" maxlength="50" required="">        
                    </div>        
    </div>

     <div class="form-group">
            <label class="col-sm-2 control-label">Program:</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="program" name="program" placeholder="Program" value="" maxlength="50" required="">        
                    </div>        
    </div>

    

    <div class="form-group">
            <label class="control-label col-md-4">Select staff photo: </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="image_id"></span>
            </div>
           </div>

    <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-success" id="saveBtn" value="create">Save changes
    </button>&nbsp;&nbsp;
    <a class="btn btn-primary" href="{{ route('frontend.stafflist.index') }}"> Back</a>
    </div>


</form>
@endsection