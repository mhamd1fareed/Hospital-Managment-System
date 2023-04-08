


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>


    <div class="container-scroller">
 
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     
      @include('admin.navbar')
      
        <!-- partial -->
   
      <div class="container-fluid page-body-wrapper">
        <div align="center" style="padding-top: 100px">
            <table>
                <tr style="background-color:  rgb(36, 237, 100);">
                    <th style="padding: 10px">Customer Name</th>
                    <th style="padding: 10px">Email</th>
                    <th style="padding: 10px">Phone</th>
                    <th style="padding: 10px">Doctor Name</th>
                    <th style="padding: 10px">Date</th>
                    <th style="padding: 10px">Message</th>
                    <th style="padding: 10px">Status</th>
                    <th style="padding: 10px">Approved</th>
                    <th style="padding: 10px">Cancelled</th>
                </tr>
                @foreach ($appointments as $appointment)
                    
                
                <tr align="center">
                    <td>{{$appointment->name}}</td>
                    <td>{{$appointment->email}}</td>
                    <td>{{$appointment->phone}}</td>
                    <td>{{$appointment->doctor}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>{{$appointment->message}}</td>
                    <td>{{$appointment->status}}</td>
                    <td><a class="btn btn-success" href="{{url('approve',$appointment->id)}}">Approve</a></td>
                    <td><a class="btn btn-danger" href="{{url('cancel',$appointment->id)}}">Cancel</a></td>
                </tr>
                @endforeach
            </table>
        </div>
      </div>
      @include('admin.script')
    
  </body>
</html>