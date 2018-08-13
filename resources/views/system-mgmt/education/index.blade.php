@extends('system-mgmt.education.base')
@section('action-content')
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of Emloyee Qulafications</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" data-toggle="modal" href="#myModal">Add  Qulafications</a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table  class="table table-bordered table-hover " >
              <thead>
                <tr>
                  <th>Level</th>
                  <th>Division</th>
                  <th>Passing year</th>
                  <th>Instition</th>
                  <th>Subject</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

               @if($pgraduation)
               <tr>
                <td>Post Graduation</td>
                <td>{{$pgraduation->division}}</td>
                <td>{{$pgraduation->passing_year}}</td>
                <td>{{$pgraduation->name_inst}}</td>
                <td>{{$pgraduation->subject}}</td>
                <td><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('/employee-education-delete/'.$pgraduation->id)}}" class="btn btn-sm btn-info">Delete</a>
                  <a href="{{url('/employee-education-edit/'.$pgraduation->id)}}" class="btn btn-info btn-sm">Edit</a>
                </td>
              </tr>
              @endif

              @if($graduation)
              <tr>
                <td>Graduation</td>
                <td>{{$graduation->division}}</td>
                <td>{{$graduation->passing_year}}</td>
                <td>{{$graduation->name_inst}}</td>
                <td>{{$graduation->subject}}</td>
                <td><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('/employee-education-delete/'.$graduation->id)}}" class="btn btn-sm btn-info">Delete</a>
                  <a href="{{url('/employee-education-edit/'.$graduation->id)}}" class="btn btn-info">Edit</a>

                </td>
              </tr>
              @endif



              @if($hsc)
              <tr>
               <td>HSC</td>
               <td>{{$hsc->division}}</td>
               <td>{{$hsc->passing_year}}</td>
               <td>{{$hsc->name_inst}}</td>
               <td>{{$hsc->subject}}</td>
               <td><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('/employee-education-delete/'.$hsc->id)}}" class="btn btn-sm btn-info">Delete</a>
                <a href="{{url('/employee-education-edit/'.$hsc->id)}}" class="btn btn-info btn-sm">Edit</a>

              </td>
            </tr>
            @endif

            @if($ssc)
            <tr>
             <td>SSC</td>
             <td>{{$ssc->division}}</td>
             <td>{{$ssc->passing_year}}</td>
             <td>{{$ssc->name_inst}}</td>
             <td>{{$ssc->subject}}</td>
             <td><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('/employee-education-delete/'.$ssc->id)}}" class="btn btn-sm btn-info">Delete</a>
               <a href="{{url('/employee-education-edit/'.$ssc->id)}}" class="btn btn-info btn-sm">Edit</a>
             </td>
           </tr>

           @endif
           @if($diploma)
           <tr>
             <td>Diploma</td>
             <td>{{$diploma->division}}</td>
             <td>{{$diploma->passing_year}}</td>
             <td>{{$diploma->name_inst}}</td>
             <td>{{$diploma->subject}}</td>
             <td><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('/employee-education-delete/'.$diploma->id)}}" class="btn btn-sm btn-info">Delete</a>
              <a href="{{url('/employee-education-edit/'.$diploma->id)}}" class="btn btn-info btn-sm">Edit</a>

            </td>
          </tr>

          @endif
          
        </tbody>

      </table>
    </div>
  </div>

</div>
</div>
<!-- /.box-body -->
</div>
</section>
<!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">



    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Educational Qualification</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form" role="form" method="POST" action="{{url('/employee-education-store')}}">
          {{ csrf_field() }}
          
          <input type="hidden" name="em_id" value="{{$emId}}">
          <div class="form-group">
            <label for="name" class="col-md-4 control-label">Education Level</label>
            <div class="col-md-6">
              <select class="form-control" name="edu_level">
                <option value="Post Graduation">Post Graduation</option>
                <option value="Graduation">Graduation</option>
                <option value="HSC">HSC</option>
                <option value="SSC">SSC</option>
                <option value="Diploma">Diploma</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="country_code" class="col-md-4 control-label">Division</label>
            <div class="col-md-6">
              <select class="form-control" name="division">
                <option value="-1">--select one--</option>
                <option value="Barishal">Barishal</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Khulna">Khulna</option>
                <option value="Mymensingh">Mymensingh</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Sylhet">Sylhet</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="country_code" class="col-md-4 control-label">Passing year</label>
            <div class="col-md-6">
              <input type="number" name="passing_year" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label for="country_code" class="col-md-4 control-label">Name of Instatition</label>
            <div class="col-md-6">
              <input type="text" name="name_inst" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label for="country_code" class="col-md-4 control-label">Subject</label>
            <div class="col-md-6">
              <!-- <input type="text" name="university" class="form-control" /> -->
              <select name="subject" class="form-control" >
                <option value="-1">--select one--</option>
                @foreach($subjects as $subject)
                <option value="{{$subject->name}}">{{$subject->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Create
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection