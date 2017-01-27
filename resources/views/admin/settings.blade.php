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
                                <li><a href="#">Delete</a></li>
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


    <div class="row">
           <!-- department -->

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

                    <form method="POST" action="{{url('/departments')}}"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <div class="input-group">
                        {!! Form::text('name', null,  ['class' => 'form-control']) !!}   
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">
                              <i class="fa fa-plus" aria-hidden="true"></i> add
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

                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                 Name
                            </th>
                            <th width="10%" colspan="2">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($departments as $department)
                        <tr>
                            <td>
                                {{$department->name}}
                            </td>
                            <td>
                                <a class="btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            </td>
                             <td>
                                <a class="btn btn-default">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                <h5>No Data Found</h5>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                        
                </div><!-- end panel baody -->
            </div><!-- end panel-default -->
    </div><!-- end col-md-4 -->

    </div><!-- end row -->
    </div><!-- end container -->


@endsection
