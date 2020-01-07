<div class="table-responsive">

        

    <table class="table table-striped table-hover table-bordered">            
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
            
            <th>Days taken</th>
        </tr>
        @foreach ($data->cleaves as $datas)
        <tr>
            <td>{{ date('d-m-Y', strtotime( $datas->startdate )) }}</td>
            <td>{{ date('d-m-Y', strtotime( $datas->enddate )) }}</td>
            <td>{{$datas->daystaken}}</td>
            
            
        </tr>
       @endforeach
        
    </table>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('frontend.compasionate.create',['id' => $data->id]) }}"> Add Compasionate Leave</a> 
        
        
    </div>
</div>