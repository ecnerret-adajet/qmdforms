    @extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                    Companies
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">
                <table class="table table_custom_default">

                    <tbody>
                    @forelse($companies as $company)



                        <tr>
                            <td width="10%">
                            {{$company->id}}
                            </td>
                            <td width="70%">
                                {{$company->name}}
                            </td>

                             <td class="pull-right">
                               <div class="btn-group">
                            <div class="btn-group">
                              <a href="#" class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                Option
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu">
                                <li>
                                 <a data-toggle="modal" data-target=".bs-show-company-{{$company->id}}-modal-lg" href="">
                                Edit
                                </a>
                                </li>
                                <li><a data-toggle="modal" data-target=".bs-delete{{$company->id}}-modal-lg" href="">
                                Delete
                                </a></li>
                               </ul>
                            </div>
                          </div>

                            </td>
                        </tr>


                    <!-- Show modal information -->
                    <div class="modal fade bs-show-company-{{$company->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog">
                        <div class="modal-content" style="min-width: 850px;  margin-left: -80px;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Compay</h4>
                          </div>
                          <div class="modal-body">
                                {!! Form::model($company, ['method' => 'PATCH','route' => ['companies.update', $company->id]]) !!}
                             {!! csrf_field() !!}


                                 <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12 ">
                                <label class="control-label">
                                {!! Form::label('name', 'Company Name:') !!}
                                </label>
                                </div>

                                <div class="col-md-12">
                                {!! Form::text('name', null, ['class' => 'form-control'] ) !!}
                                @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                                </div>
                                </div>

                        
                          
                          </div><!-- modal body -->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            {!! Form::close() !!}
                          </div>
                          
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->    



                    <!-- Delete a company modal -->
                      <div class="modal fade bs-delete{{$company->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Delete a company</h4>
                            </div>
                            <div class="modal-body">
                                    <div class="row">
                              <div class="col-md-12">
                              <div class="panel-body text-center"> 
                          
                              <h4>  
                                  Are you sure you want to delete this company ?
                              </h4>
                              <em>
                              <small>This may affect documents that selects under this name</small>
                              </em>
                                          
                           <form method="POST" action="companies/{{$company->id}}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">   
                                                              
                          </div>
                              </div>
                          </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Confirm</button>
                                
                                 
                            </div>
                            </form> 
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->      



                             @empty
                        <tr>
                            <td colspan="2">
                                <h5>No Data Found</h5>
                            </td>
                        </tr>

                    @endforelse
                    </tbody>
                </table>

                      <div class="row">
                          <div class="col-md-12">

                    <form method="POST" action="{{url('/companies')}}"  enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                      <div class="input-group">
                        {!! Form::text('name', null,  ['class' => 'form-control','placeholder' => '...Add new company']) !!}   
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">
                              <i class="fa fa-plus" aria-hidden="true"></i> Add
                          </button>
                        </span>


                      </div>
                          @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif


                    </div>




                    </form>

                          </div>


                        </div><!-- end row  -->
               
                   {{ $companies->links('vendor/pagination.default') }}


                </div>


            </div>
        </div>


     



    </div><!-- end row -->

    <!-- department -->
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                    Departments
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">
                <table class="table table_custom_default">

                    <tbody>
                    @forelse($departments as $department)



                        <tr>
                            <td width="10%">
                            {{$department->id}}
                            </td>
                            <td width="70%">
                                {{$department->name}}
                            </td>

                             <td class="pull-right">
                               <div class="btn-group">
                            <div class="btn-group">
                              <a href="#" class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                Option
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu">
                                <li>
                                 <a data-toggle="modal" data-target=".bs-show-department-{{$department->id}}-modal-lg" href="">
                                Edit
                                </a>
                                </li>
                                  <li><a data-toggle="modal" data-target=".bs-delete{{$department->id}}-modal-lg" href="">
                                Delete
                                </a></li>
                               </ul>
                            </div>
                          </div>

                            </td>
                        </tr>


                    <!-- Show modal information -->
                    <div class="modal fade bs-show-department-{{$department->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog">
                        <div class="modal-content" style="min-width: 850px;  margin-left: -80px;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Compay</h4>
                          </div>
                          <div class="modal-body">
                                {!! Form::model($department, ['method' => 'PATCH','route' => ['departments.update', $department->id]]) !!}
                             {!! csrf_field() !!}


                                 <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12 ">
                                <label class="control-label">
                                {!! Form::label('name', 'department Name:') !!}
                                </label>
                                </div>

                                <div class="col-md-12">
                                {!! Form::text('name', null, ['class' => 'form-control'] ) !!}
                                @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                                </div>
                                </div>

                        
                          
                          </div><!-- modal body -->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            {!! Form::close() !!}
                          </div>
                          
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->    


                     <!-- Delete a department modal -->
                      <div class="modal fade bs-delete{{$department->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Delete a Department</h4>
                            </div>
                            <div class="modal-body">
                                    <div class="row">
                              <div class="col-md-12">
                              <div class="panel-body text-center"> 
                          
                              <h4>  
                                  Are you sure you want to delete this department ?
                              </h4>
                              <em>
                              <small>This may affect documents that selects under this name</small>
                              </em>
                                          
                           <form method="POST" action="departments/{{$department->id}}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">   
                                                              
                          </div>
                              </div>
                          </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Confirm</button>
                                
                                 
                            </div>
                            </form> 
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->      



                             @empty
                        <tr>
                            <td colspan="2">
                                <h5>No Data Found</h5>
                            </td>
                        </tr>

                    @endforelse
                    </tbody>
                </table>

                      <div class="row">
                          <div class="col-md-12">

                    <form method="POST" action="{{url('/departments')}}"  enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                      <div class="input-group">
                        {!! Form::text('name', null,  ['class' => 'form-control','placeholder' => '...Add new department']) !!}   
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">
                              <i class="fa fa-plus" aria-hidden="true"></i> Add
                          </button>
                        </span>


                      </div>
                          @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif


                    </div>




                    </form>

                          </div>


                        </div><!-- end row  -->
               
                   {{ $departments->links('vendor/pagination.default') }}


                </div>


            </div>
        </div>


     



    </div><!-- end row -->


    </div><!-- end container -->


@endsection
