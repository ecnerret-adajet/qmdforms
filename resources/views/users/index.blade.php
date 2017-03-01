@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                   All Users
                   <a href="{{url('users/create')}}" class="btn btn-default">
                   Add New User
                   </a>
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">

                 <table id="table-data" class="table nowrap display table-striped table-hover table_custom" width="100%">
                <thead>
                <tr>
                    <th>
                    User Id
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                     Position
                    </th>
                    <th>
                       Company
                    </th>
                    <th>
                      Department
                    </th>
                    <th>
                        Role
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                        <a data-toggle="modal" data-target=".bs-show-user-{{$user->id}}-modal-lg" href="">
                        {{$user->id}}
                        </a>
                        </td>
                        <td>
                        {{$user->name}}
                        </td>
                        <td>
                        {{$user->position}}
                        </td>                       
                        <td>
                        @foreach($user->companies as $company)
                            {{$company->name}}
                        @endforeach
                        </td>
                        <td>
                        @foreach($user->departments as $department)
                            {{ str_limit($department->name, 10)}}
                        @endforeach
                        </td>
                        <td>
                        @foreach($user->roles as $role)
                            {{$role->name}}<br/>
                        @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
      

                </div>
            </div>
        </div>
    </div>


     <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                    All Roles
                    </strong>
                  <a data-toggle="modal" class="btn btn-default" data-target=".create-role" href="">
                   Add Role
                   </a>
                    </h4>
                </div>

                <div class="panel-body">
                @foreach($roles as $role)
                <div class="row" style="padding: 15px;">
                  <div class="col-md-2">
                    {{$role->id}}
                  </div>
                  <div class="col-md-10">
                    {{$role->name}}
                  </div>
                </div><!-- end row -->
                @endforeach


                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODALS | MODALS |  MODALS |  MODALS |  MODALS | MODALS |  MODALS |  MODALS |  MODALS |  MODALS |  -->

@foreach($users as $user)
<!-- Show modal information -->
<div class="modal fade bs-show-user-{{$user->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content" style="min-width: 850px;  margin-left: -80px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Document Distribution Request: Detailed</h4>
      </div>
      <div class="modal-body">

      <table class="table table_custom">
            <tr>
                <th>
                    Name
                </th>
                <td>
                    {{$user->name}}
                </td>
                <th class="success">
                    Role
                </th>
                <td>
                    @foreach($user->roles as $role)
                      {{$role->display_name}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    Email
                </th>
                <td colspan="3">
                    {{$user->email}}
                </td>
            </tr>

            <tr>
                <th>
                    Company
                </th>
                <td colspan="3">
                  @foreach($user->companies as $company)
                    {{$company->name}}
                  @endforeach
                </td>
            </tr>

            <tr>
                <th>
                   Department
                </th>
                <td colspan="3">
                  @foreach($user->departments as $department)
                    {{$department->name}}
                  @endforeach
                </td>
            </tr>


      </table>


    
      
      </div><!-- modal body -->
      <div class="modal-footer">
        <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-primary">Update Info</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
@endforeach


<!-- Show modal information -->
<div class="modal fade create-role" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content" style="min-width: 850px;  margin-left: -80px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Role</h4>
      </div>
      <div class="modal-body">
      {!! Form::open(array('route' => 'roles.store','method'=>'POST','class' => 'form-horizontal')) !!}
        {!! csrf_field() !!}

      
      @include('roles.form')

      
      </div><!-- modal body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       {!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    





@endsection
