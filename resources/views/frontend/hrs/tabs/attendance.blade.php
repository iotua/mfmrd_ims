<div class="table-responsive">

        

        <table class="table table-striped table-hover table-bordered">            
            <tr>
                <th>Date</th>
                <th>Day</th>
                <th>In</th>
                <th>Out</th>    
                <th>Remark</th>  
                <th>Actions</th>         
            </tr>
            @foreach ($data->attendances as $datas)
            <tr>
                
                <td>{{$datas->date}}</td>
                <td>{{$datas->day}}</td>
                <td>{{$datas->punch_in}}</td>
                <td>{{$datas->punch_out}}</td>
                <td>
                    
                    @if ($datas->punch_in == '' && $datas->remark == '' && $datas->work_rest != 'RESTDAY' && $datas->work_rest != 'HOLIDAY')
                    <span style="color: red;">No Morning sign-up</span>
                    @endif    

                    @if ($datas->punch_out == '' && $datas->remark == '' && $datas->work_rest != 'RESTDAY' && $datas->work_rest != 'HOLIDAY') 
                    <span style="color: red;">No Afternoon sign-up</span>
                    @endif                    
                    
                    <span style="color: red;">
                    {{$datas->remark}}</span>
                    </td>
                <td> 
                    @if ($datas->work_rest != 'RESTDAY' && $datas->work_rest != 'HOLIDAY' )
                    <div class="centre">
                        <a class="btn btn-primary" href="{{ route('frontend.attendance.edit',['id' => $datas->id]) }}"> Update</a> 
                        
                        
                    </div>
                    @endif

                </td>
                
                
            </tr>
           @endforeach
            
        </table>
        
    </div>