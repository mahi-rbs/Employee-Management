@extends('users-mgmt.base')
@section('action-content')
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of users</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('user-management.create') }}">Add new user</a>
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
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th>SL</th>
                  <th width="10%">User Name</th>
                  <th width="20%" >Email</th>
                  
                  <th width="20%" >Role</th>
                  <th width="20%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $key => $user)
                <tr role="row" class="odd">
                  <td>{{$key+1}}</td>
                  <td class="sorting_1">{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
                  
                  <td >
                    <form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="{{ route('user-management.edit', ['id' => $user->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                      </a>
                      @if ($user->username != Auth::user()->username)
                      <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                        Delete
                      </button>
                      @endif
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>SL</th>
                  <th width="10%">User Name</th>
                  <th width="20%" >Email</th>
                  
                  <th width="20%" >Role</th>
                  <th width="20%">Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($users)}} of {{count($users)}} entries</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{ $users->links() }}
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
@endsection