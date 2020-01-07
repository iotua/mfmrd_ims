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
        <h2>Staff Information</h2>
    </div>
    
    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            
            <tr  >
                <th style="text-align:center" rowspan=12 ><img src={{ URL::to('/') }}/images/hrs/{{  $data->photolocation }} width='300'>
                <br/><br/>
               
                
                <div style="display: none">
                    {{ $atotal = 0 }}                   
                    @foreach ($data->leaves as $datas)
                    {{ $atotal+=$datas->daystaken}}
                    @endforeach
                </div>   

                <div style="display: none">
                    {{ $leavebal = 0 }}                   
                    @foreach ($data->leavebals as $datas)
                    {{ $leavebal+=$datas->bal}}
                    @endforeach
                </div>                 
                         
                
                              
                <div style="display: none">
                        {{ $total = 0 }}                       
                        @foreach ($data->sleaves as $datas)
                        {{ $total+=$datas->daystaken}}
                        @endforeach
                    </div>
                    
               
                 
                <div style="display: none">
                    {{ $ctotal = 0 }}
                   
                    @foreach ($data->cleaves as $datas)
                    {{ $ctotal+=$datas->daystaken}}
                    @endforeach
                </div>
                
                <div style="display: none">
                    {{ $cbal=3-$ctotal }}
                </div>
                <div class="alert alert-primary">
                <div class="alert-title">Leave Bal (1 Jan 2019) - {{$leavebal}} day(s)</div>
                        <div class="alert-title">Compasionate : {{$ctotal}} day(s) --> ({{$cbal}} remaining)</div>
                        
                </div>
                <div style="display: none">
                    {{ $ttotal = 0 }}
                   
                    @foreach ($data->travels as $datas)
                    {{ $ttotal+=$datas->daystaken}}
                    @endforeach
                </div>

                <div class="alert alert-success">
                            <div class="alert-title">Approved Annual Leave: {{$atotal}} day(s)</div>
                            <div class="alert-title">Approved Sick Leave: {{$total}} day(s)</div>
                            <div class="alert-title">Approved Compasionate : {{$ctotal}} day(s)</div>
                            <div class="alert-title">Absent on Official travel : {{$ttotal}} day(s)</div>



                    </div>
                
                <div style="display: none">
                    {{ $absenttotal = 0 }}
                   
                    @foreach ($data->attendances as $datas)
                    {{ $absenttotal+=$datas->absent}}
                    @endforeach
                </div>
                <div class="alert alert-danger">
                        <div class="alert-title">Total Absent: {{$absenttotal}} day(s) - Fingerprint</div>
                        
                </div>
               
                <div class="alert alert-danger">
                        <div class="alert-title">Current Leave Bal: {{$atotal+$total+$ctotal+$ttotal-$absenttotal+$leavebal}} day(s)</div>
                        
                </div>
                
                
                </th>
                <th>Full Name</th>
                <td>{{ $data->fullname}}</td>
            </tr>
            <tr>
                <th >PF Number</th>
                <td>{{ $data->pfnumber}}</td>
            </tr>
            <tr>
                <th >Division</th>
                <td>{{ $data->division}}</td>
            </tr>
            <tr>
                <th >Post Title</th>
                <td>{{ $data->posttitle}}</td>
            </tr>
            <tr>
                <th >Salary Level</th>
                <td>{{ $data->salarylevel}}</td>
            </tr>
            <tr>
                <th >Current Salary Level</th>
                <td>{{ $data->cursalarylevel}}</td>
            </tr>
            <tr>
                <th >Date of Appointment</th>
                <td>{{ date('d-m-Y', strtotime( $data->dateofappointment )) }}</td>
            </tr>
            <tr>
                <th >Date of Birth</th>
                
                <td>{{ date('d-m-Y', strtotime( $data->dataofbirth )) }} -- ( {{ $data->age}} years old)</td>
            </tr>
            <tr>
                <th >Gender</th>
                <td>{{ $data->gender}}
                </td>
            </tr>
            <tr>
                <th >Appointment Type</th>
                <td>{{ $data->appointmenttype}}</td>
            </tr>
            <tr>
            <th >Qualification</th>
                <td>{{ $data->qualification}}</td>
            </tr> 
            <tr>
            <th >Program</th>
                <td>{{ $data->program}}</td>
            </tr>  
            <tr>
                <td colspan=3>
                        <div class="card-body">
                                <div role="tabpanel">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a href="#leave" class="nav-link active" aria-controls="leave" role="tab" data-toggle="tab">Annual Leave</a>
                                        </li>
            
                                        <li class="nav-item">
                                            <a href="#sick" class="nav-link" aria-controls="sick" role="tab" data-toggle="tab">Sick Leave</a>
                                        </li>
            
                                        
                                        <li class="nav-item">
                                                <a href="#compasionate" class="nav-link" aria-controls="compasionate" role="tab" data-toggle="tab">Compasionate Leave</a>
                                         </li>

                                         <li class="nav-item">
                                                <a href="#attendance" class="nav-link" aria-controls="attendance" role="tab" data-toggle="tab">Attendance</a>
                                         </li>

                                         <li class="nav-item">
                                                <a href="#travel" class="nav-link" aria-controls="travel" role="tab" data-toggle="tab">Travel</a>
                                         </li>
                                        
                                    </ul>
            
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade show active pt-3" id="leave" aria-labelledby="leave-tab">
                                            @include('frontend.hrs.tabs.leave')
                                        </div><!--tab panel profile-->
            
                                        <div role="tabpanel" class="tab-pane fade show pt-3" id="sick" aria-labelledby="sick-tab">
                                            @include('frontend.hrs.tabs.sick')
                                        </div><!--tab panel profile-->
                                        
                                        <div role="tabpanel" class="tab-pane fade show pt-3" id="attendance" aria-labelledby="attendance-tab">
                                                @include('frontend.hrs.tabs.attendance')
                                        </div><!--tab panel profile-->

                                        <div role="tabpanel" class="tab-pane fade show pt-3" id="compasionate" aria-labelledby="compasionate-tab">
                                            @include('frontend.hrs.tabs.compasionate')
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade show pt-3" id="travel" aria-labelledby="travel-tab">
                                            @include('frontend.hrs.tabs.travel')
                                        </div>

                                    </div><!--tab panel profile-->
                                       
                                    </div><!--tab content-->
                                </div><!--tab panel-->
                            </div><!--card body-->
                </td>   
            </tr>
           
        </table>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('frontend.stafflist.index') }}"> Back</a>
                
                
            </div>
            
        </div>
    </div>
   <br/>

@endsection