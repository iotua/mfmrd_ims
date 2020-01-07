<div class="table-responsive">

        

        <table class="table table-striped table-hover table-bordered">            
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                
                <th>Days taken</th>
                <th>Certificate</th>
            </tr>
            @foreach ($data->sleaves as $datas)
            <tr>
                    <td>{{ date('d-m-Y', strtotime( $datas->startdate )) }}</td>
                    <td>{{ date('d-m-Y', strtotime( $datas->enddate )) }}</td>
                    <td>{{$datas->daystaken}}</td>
                    <td><a href="/images/sleave/{{$datas->certificate}}">View/Download</a></td>
                
                
            </tr>
           @endforeach
            
        </table>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('frontend.sick.create',['id' => $data->id]) }}"> Add Sick Leave</a> 
            
            
        </div>
    </div>
    
    