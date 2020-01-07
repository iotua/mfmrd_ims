@extends('frontend.layouts.app')

@section('content')  
<h1>New Outgoing Mail</h1>

<form action="{{ route('frontend.out.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<input type="hidden" name="product_id" id="product_id">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Date</label>
        <div class="col-sm-12">
            <input type="date" class="form-control" id="date" name="date"  value="" required="">
        </div>
    </div>     

    <div class="form-group">
        <label class="col-sm-2 control-label">Mail_Subject:</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="mailsubject" name="mailsubject" placeholder="Enter mail subject" value="" maxlength="50" required="">
        </div>
    </div>

    <div class="form-group">
            <label class="col-sm-2 control-label">Letter_dated</label>    
            <div class="col-sm-12">    
                <input type="date" class="form-control" id="letterdated" name="letterdated"  value="" required="">    
            </div>    
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Sender/Writer</label>        
                <div class="col-sm-12">        
                    <input type="text" class="form-control" id="sender" name="sender" placeholder="Enter Sender" value="" maxlength="50" required="">        
                </div>        
    </div> 
    
    <div class="form-group">
            <label class="col-sm-2 control-label">Department</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="department" name="department" placeholder="Enter department" value="" maxlength="50" required="">        
                    </div>        
    </div>

    <div class="form-group">
            <label class="col-sm-2 control-label">File_Ref:</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="codenumber" name="codenumber" placeholder="Enter File ref" value="" maxlength="50" required="">        
                    </div>        
    </div>

     <div class="form-group">
            <label class="col-sm-2 control-label">Conncern Officer:</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="concernofficer" name="concernofficer" placeholder="Enter File ref" value="" maxlength="50" required="">        
                    </div>        
    </div>

    <div class="form-group">
            <label class="col-sm-2 control-label">Ministry</label>        
                    <div class="col-sm-12">        
                        <input type="text" class="form-control" id="ministry" name="ministry" placeholder="Enter department" value="" maxlength="50" required="">        
                    </div>        
    </div>

    

    <div class="form-group">
            <label class="control-label col-md-4">Select letter: </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="image_id"></span>
            </div>
           </div>

    <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-success" id="saveBtn" value="create">Save changes
    </button>&nbsp;&nbsp;
    <a class="btn btn-primary" href="{{ route('frontend.out.index') }}"> Back</a>
    </div>


</form>
@endsection