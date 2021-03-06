@extends('frontend.layouts.app')

@section('content')  
<div class="container">    
        <div class="col-sm-12">

                @if(session()->get('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}  
                  </div>
                @endif
              </div>
        <br />
        <h3 align="center">MAIL Recording System - Incoming</h3>
        <br />
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('frontend.in.create') }}">New Incoming Mail</a>
        </div>
        <br />
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div><br />
        @endif
      <div class="table-responsive">
       <table class="table table-bordered table-striped" id="user_table">
              <thead>
               <tr>                     
                       <th width="15%">Date</th>
                       <th width="40%">Mail Subject</th>                            
                       <th width="15%">Sender</th>                      
                       <th width="15%">Action</th>
               </tr>
              </thead>
          </table>
      </div>
      <br />
      <br />
</div>


<div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">New Incoming Mail</h4>
               </div>
               <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                   @csrf
                   <div class="form-group">
                       <label class="control-label col-md-4" >Date: </label>
                       <div class="col-md-8">
                           <input type="date" name="date" id="date" class="form-control" />
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="control-label col-md-4" >Mail Subject: </label>
                       <div class="col-md-8">
                           <input type="text" name="mailsubject" id="mailsubject" class="form-control" />
                       </div>
                   </div>
       
                   <div class="form-group">
                           <label class="control-label col-md-4" >Writer: </label>
                           <div class="col-md-8">
                               <input type="text" name="sender" id="sender" class="form-control" />
                           </div>
                   </div>
       
                   <div class="form-group">
                           <label class="control-label col-md-4" >Department: </label>
                           <div class="col-md-8">
                               <input type="text" name="department" id="department" class="form-control" />
                           </div>
                   </div>
       
                   <div class="form-group">
                           <label class="control-label col-md-4" >File ref: </label>
                           <div class="col-md-8">
                               <input type="text" name="codenumber" id="codenumber" class="form-control" />
                           </div>
                   </div>
                   
                   <div class="form-group">
                           <label class="control-label col-md-4" >Concerned Officer: </label>
                           <div class="col-md-8">
                               <input type="text" name="concernofficer" id="concernofficer" class="form-control" />
                           </div>
                   </div>
       
                   <div class="form-group">
                           <label class="control-label col-md-4" >Letter Date: </label>
                           <div class="col-md-8">
                               <input type="date" name="letterdated" id="letterdated" class="form-control" />
                           </div>
                   </div>
       
                   <div class="form-group">
                           <label class="control-label col-md-4" >Actions : </label>
                           <div class="col-md-8">
                               <input type="text" name="actions" id="actions" class="form-control" />
                           </div>
                   </div>
       
                   <div class="form-group">
                           <label class="control-label col-md-4" >ID : </label>
                           <div class="col-md-8">
                               <input type="text" name="hidden_id" id="hidden_id" class="form-control" />
                           </div>
                   </div>
       
                  <div class="form-group">
                   <label class="control-label col-md-4">Select Profile Image : </label>
                   <div class="col-md-8">
                    <input type="file" name="image" id="image" />
                    <span id="store_image"></span>
                   </div>
                  </div>
                  <br />
                  <div class="form-group" align="center">
                   <input type="hidden" name="action" id="action" />
                   <label type="hidden" name="hidden_id" id="hidden_id" />
                   <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                  </div>
                </form>
               </div>
            </div>
           </div>
       </div>
       
       <div id="confirmModal" class="modal fade" role="dialog">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h2 class="modal-title">Confirmation</h2>
                   </div>
                   <div class="modal-body">
                       <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                   </div>
                   <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                   </div>
               </div>
           </div>
       </div>


    <script>
        $(document).ready(function(){
            
            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                "order": [[ 0, "desc" ]],
                
                ajax:{
                    url: "{{ route('frontend.in.index') }}",
                },
                columns:[        
                    { data: 'date', name: 'date' },
                    { data: 'mailsubject', name: 'mailsubject' },
                    { data: 'sender', name: 'sender' },
                    { data: 'action', name: 'action', orderable: false }
                ]
            });
            
            
            
            
    
            
        var user_id;
    
        $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');   
            $('#confirmModal').modal('show');
        });
        
        $('#ok_button').click(function(){
            $.ajax({
                url:"mrs/destroy/"+user_id,
                    beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                    },
                success:function(data)
                {
                setTimeout(function(){
                    $('#confirmModal').modal('hide');
                    $('#user_table').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });
    
    });
    </script>


@endsection

@push('scriptme')
    <script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}} " ></script>    
    <script type="text/javascript" src="{{URL::asset('js/jquery.dataTables.min.js')}} " defer></script>
    <script type="text/javascript" src="{{URL::asset('js/dataTables.bootstrap.min.js')}} "  ></script>   
@endpush

@push('styleme')   
    <link href="{{ URL::asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" >    
@endpush