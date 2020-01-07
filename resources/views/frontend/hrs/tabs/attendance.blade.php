<div class="table-responsive">

        

        <table class="table table-striped table-hover table-bordered">            
            <tr>
                <th>Months</th>
                <th>Total Absent</th>
                <th>Total Presents</th>               
            </tr>
            @foreach ($data->attendances as $datas)
            <tr>
                
                <td>{{$datas->month}}</td>
                <td>{{$datas->absent}}</td>
                <td>{{$datas->present}}</td>
                
                
            </tr>
           @endforeach
            
        </table>
        
    </div>