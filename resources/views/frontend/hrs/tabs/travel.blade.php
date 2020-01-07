<div class="table-responsive">

        

        <table class="table table-striped table-hover table-bordered">            
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Purpose</th>
                <th>Destination</th>                
                <th>Duration</th>
            </tr>
            @foreach ($data->travels as $datas)
            <tr>
                <td>{{ date('d-m-Y', strtotime( $datas->startdate )) }}</td>
                <td>{{ date('d-m-Y', strtotime( $datas->enddate )) }}</td>
                <td>{{$datas->purpose}}</td>
                <td>{{$datas->destination}}</td>
                <td>{{$datas->daystaken}}</td>
                
                
            </tr>
           @endforeach
            
        </table>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('frontend.travel.create',['id' => $data->id]) }}"> Add Travel</a> 
            
            
        </div>
    </div>