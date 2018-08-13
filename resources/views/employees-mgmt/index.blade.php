@extends('employees-mgmt.base')
@section('action-content')
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of employees</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('employee-management.create') }}">Add new employee</a>
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
            <table id="example1" class="table table-bordered table-hover dataTable" >
              <thead>
                <tr >
                  <th width="8%">Picture</th>
                  <th width="10%">Name</th>
                  <th width="8%">Designation</th>
                  <th width="8%" >Mobile</th>
                  <th width="8%" >Work Place</th>
                  <th width="8%" >Join Date</th>
                  
                  <th width="12%" >Address</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee)
                <tr role="row" class="odd">
                  <td><img src="../avatars/{{$employee->picture}}" width="50px" height="50px"/></td>
                  <td class="sorting_1">{{ $employee->name }}</td>
                  <td class="hidden-xs">{{ $employee->designation_name }}</td>
                  <td class="hidden-xs">{{ $employee->mobile }}</td>
                  <td class="hidden-xs">{{ $employee->work_place }}</td>
                  <td class="hidden-xs">{{ $employee->date_hired }}</td>
                  <td class="hidden-xs">{{ $employee->pre_address }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('employee-management.destroy', ['id' => $employee->id]) }}" onsubmit = "return confirm('Are you sure?')">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="{{ route('employee-management.edit', ['id' => $employee->id]) }}" class="btn btn-xs btn-primary col-sm-2 col-xs-5 btn-margin">
                        Edit
                      </a>
                      <a href="{{ route('employee-management.show', ['id' => $employee->id]) }}" class="btn btn-warning col-sm-2 col-xs-5 btn-margin btn-xs">
                        View
                      </a>
                      <a href="{{ url('employee-education').'/'.$employee->id }}" class="btn btn-xs btn-success col-sm-2 col-xs-5 btn-margin">
                        Education
                      </a>
                      <button type="submit" class="btn btn-danger col-sm-2 col-xs-5 btn-xs btn-margin">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <tr role="row">
                    <th width="8%" >Picture</th>
                    <th width="10%" >Name</th>
                    <th width="8%" >Designation</th>
                    <th width="8%" >Mobile</th>
                    <th width="8%" >Join Date</th>
                    <th width="12%" >Address</th>
                    <th tabindex="0">Action</th>
                  </tr>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($employees)}} of {{count($employees)}} entries</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{ $employees->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
<!-- /.content -->
</div>
@section('footer-asstes')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

</script>
@endsection
@endsection