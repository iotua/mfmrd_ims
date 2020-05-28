<div class="table-responsive">

        

        <table class="table table-striped table-hover table-bordered">            
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                
                <th>Days taken</th>
                
            </tr>
            @foreach ($data->mleaves as $datas)
            <tr>
                    <td>{{ date('d-m-Y', strtotime( $datas->startdate )) }}</td>
                    <td>{{ date('d-m-Y', strtotime( $datas->enddate )) }}</td>
                    <td>{{$datas->daystaken}}</td>
                    
                
                
            </tr>
           @endforeach
            
        </table>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('frontend.maternity.create',['id' => $data->id]) }}"> Add Maternity Leave</a> 
            
            
        </div>
    </div>
    
    