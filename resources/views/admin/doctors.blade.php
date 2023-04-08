


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
                    <th style="padding: 10px">Doctor Name</th>
                    <th style="padding: 10px">Phone</th>
                    <th style="padding: 10px">Speciality</th>
                    <th style="padding: 10px">Room</th>
                    <th style="padding: 10px">Image</th>
                    <th style="padding: 10px">Delete</th>
                    <th style="padding: 10px">Update</th>
                 
                </tr>
                @foreach ($doctors as $doctor)
                    
                
                <tr align="center" >
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->speciality}}</td>
                    <td>{{$doctor->room}}</td>
                    <td><img height="100" width="100" src="doctors_images/{{$doctor->image}}" alt=""></td>
                    <td><a onclick="return confirm('are you sure to delete that!?')" class="btn btn-danger" href="{{url('delete_doctor',$doctor->id)}}">Delete</a></td>
                    <td><a class="btn btn-primary" href="{{url('update_doctor',$doctor->id)}}">Update</a></td>

                </tr> 
                @endforeach
            </table>
        </div>
    </div>

      @include('admin.script')
    
  </body>
</html>