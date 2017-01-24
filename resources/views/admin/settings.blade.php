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
                            <td width="5%">
                                <a class="btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            </td>
                             <td width="5%">
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


                        


                </div>

                      <div class="panel-footer">
                <div class="row">
      <div class="col-md-12">

<form method="POST" action="{{url('/companies')}}"  enctype="multipart/form-data">
{{csrf_field()}}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

  <div class="input-group">
    {!! Form::text('name', null,  ['class' => 'form-control','placeholder' => 'Add new company']) !!}   
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

      </div>

    </div>


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




    </div>
@endsection
