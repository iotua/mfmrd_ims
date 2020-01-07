@extends('frontend.layouts.app')

@section('content')  

    

    <div class="row">    
            <h1>Mail Recording System</h1>
    </div>

    <div class="row">  
            <a  class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Record Incoming Mail</a> 
        </div>

    <div class="row">
            <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Mail Subject</th>                            
                            <th>Sender</th>                        
                            
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
    </div>
   
   

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data">
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
                                <label class="col-sm-2 control-label">Concerned_Officer:</label>        
                                        <div class="col-sm-12">        
                                            <input type="text" class="form-control" id="concernofficer" name="concernofficer" placeholder="Enter Concern Officer" value="" maxlength="50" required="">        
                                        </div>        
                        </div>

                        <div class="form-group">
                                <label class="col-sm-2 control-label">Action:</label>        
                                        <div class="col-sm-12">        
                                            <input type="text" class="form-control" id="action" name="action" placeholder="Enter Action" value="" maxlength="50" required="">        
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
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script type="application/javascript">

        $(function () { 
            $.ajaxSetup({  
                headers: {  
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }  
            });        
    
            var table = $('.data-table').DataTable({  
                processing: true,  
                serverSide: true,  
                retrieve: true,         
                                         
                ajax: "{{ route('frontend.mrs.index') }}",  
                columns: [  
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},  
                    {data: 'date', name: 'date'},  
                    {data: 'mailsubject', name: 'mailsubject'},                       
                    {data: 'sender', name: 'sender'},                
                    
                    {data: 'action', name: 'action', orderable: false, searchable: false},  
                ]
        
            });   
        
    
            $('#createNewProduct').click(function () {    
                $('#saveBtn').val("create-product");    
                $('#product_id').val('');    
                $('#productForm').trigger("reset");    
                $('#modelHeading').html("Details of Incoming mail");    
                $('#ajaxModel').modal('show');    
            });   
        
    
            $('body').on('click', '.editProduct', function () {    
                var product_id = $(this).data('id');    
                $.get("{{ route('frontend.mrs.index') }}" +'/' + product_id +'/edit', function (data) {    
                    $('#modelHeading').html("Edit Contact");    
                    $('#saveBtn').val("edit-user");    
                    $('#ajaxModel').modal('show');    
                    $('#product_id').val(data.id);    
                    $('#fullname').val(data.fullname);    
                    $('#phoneno').val(data.phoneno);    
                    $('#location').val(data.location);    
                    $('#type').val(data.type);    
                })    
            }); 
        
    
            $('#saveBtn').click(function (e) {    
                e.preventDefault();    
                $(this).html('Sending..');  
                   
                var image_name = $('#image').val();
                if(image_name == '')
                {
                    alert("Please Select Image");
                    return false;
                }
                else
                {
                    

                }
                $.ajax({    
                    data: $('#productForm').serialize(),    
                    url: "{{ route('frontend.mrs.store') }}",    
                    type: "POST",    
                    dataType: 'json',    
                    success: function (data) {    
                        $('#productForm').trigger("reset");    
                        $('#ajaxModel').modal('hide');    
                        table.draw();
                    },
        
                    error: function (data) {    
                        console.log('Error:', data);    
                        $('#saveBtn').html('Save Changes');    
                    }    
                });    
            });  
        
    
            $('body').on('click', '.deleteProduct', function () {      
                var product_id = $(this).data("id");    
                confirm("Are You sure want to delete !");               
                    $.ajax({    
                    type: "DELETE",    
                    url: "{{ route('frontend.mrs.store') }}"+'/'+product_id,    
                    success: function (data) {    
                        table.draw();    
                    },
        
                    error: function (data) {    
                        console.log('Error:', data);    
                    }        
                });    
            });        
    
        });
    
    </script> 

@endsection


@push('scriptme')
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/jquery.dataTables.min.css')}}">

<script type="text/javascript" src="{{URL::asset('js/jquery.dataTables.min.js')}} " defer></script>
@endpush