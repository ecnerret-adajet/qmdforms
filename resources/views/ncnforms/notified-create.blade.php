@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Non-conformance notification : Approver</div>
                <div class="panel-body">


                <table  width="100%">
                        <tr>
                            <td>    
                                Requester
                            </td>
                            <td>
                                    {{$ncnform->name}}
                            </td>
                        </tr>

                        <tr>
                            <td>    
                                Position
                            </td>
                            <td>
                                {{$ncnform->position}}
                            </td>
                        </tr>  

                        <tr>
                            <td>    
                               Company
                            </td>
                            <td>
                            @foreach($ncnform->companies as $company)
                                {{$company->name}}
                            @endforeach
                            </td>
                        </tr> 


                        <tr>
                            <td>    
                                Department
                            </td>
                            <td>
                                @foreach($ncnform->departments as $department)
                                    {{$department->name}}
                                @endforeach
                            </td>
                        </tr> 

                        <tr>
                            <td>    
                               Notification Number:
                            </td>
                            <td>
                                {{$ncnform->notif_number}}
                            </td>
                        </tr> 

                        <tr>
                            <td>    
                               Recurrence No:
                            </td>
                            <td>
                                {{$ncnform->recurrence_no}}
                            </td>
                        </tr> 

                        <tr>
                            <td>    
                               Recurrence No:
                            </td>
                            <td>
                                {{$ncnform->date_issuance}}
                            </td>
                        </tr> 

                        <tr>
                            <td>    
                               Issued By:
                            </td>
                            <td>
                                {{$ncnform->issued_by}}
                            </td>
                        </tr> 

                       <tr>
                            <td>    
                               Issued position:
                            </td>
                            <td>
                                {{$ncnform->issued_position}}
                            </td>
                        </tr> 

                        <tr>
                            <td>    
                               Details of non-conformity:
                            </td>
                            <td>
                                {{$ncnform->details_non_conformity}}
                            </td>
                        </tr> 

                        <tr>
                            <td colspan="2">
                            <a href="{{asset('http://172.17.2.88/qmdforms/storage/app/'.$ncnform->attach_file)}}" class="btn btn-primary btn-block" download>  
                                Download Attachement
                            </a>  

                            </td>
                        </tr> 





              </table>


           <hr/>     

       {!! Form::model($ncnnotified = new \App\Ncnnotified, ['class' => 'form-horizontal', 'url' => 'ncnforms/notified/'.$ncnform->id, 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
        {!! csrf_field() !!}


            <div class="form-group{{ $errors->has('action_taken') ? ' has-error' : '' }}">
            <div class="col-md-12 ">
            <label class="control-label">
            {!! Form::label('action_taken', 'Immediate Action Taken:') !!}
            </label>
            </div>

            <div class="col-md-12">
            {!! Form::textarea('action_taken', null, ['class' => 'form-control', 'rows' => '3'] ) !!}
            @if ($errors->has('action_taken'))
            <span class="help-block">
            <strong>{{ $errors->first('action_taken') }}</strong>
            </span>
            @endif
            </div>
            </div>

            <div class="form-group{{ $errors->has('responsible') ? ' has-error' : '' }}">
            <div class="col-md-12 ">
            <label class="control-label">
            {!! Form::label('responsible', 'Responsible:') !!}
            </label>
            </div>

            <div class="col-md-12">
            {!! Form::text('responsible', null, ['class' => 'form-control'] ) !!}
            @if ($errors->has('responsible'))
            <span class="help-block">
            <strong>{{ $errors->first('responsible') }}</strong>
            </span>
            @endif
            </div>
            </div>
                	   





    <!-- submit or cancel button section -->
    </div>
      <div class="panel-footer">
                <div class="row">
      <div class="col-md-6">
        <button type="reset" class="btn btn-default btn-block">Cancel</button>
      </div>

      <div class="col-md-6">
        <input type="button" class="btn btn-primary btn-block pull-right" value="Submit" data-toggle="modal" data-target="#myModal">
    </div>
    </div>


      </div>
            </div>




 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm Changes</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to save changes? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

         {!! Form::submit('Submit', ['class' => 'btn btn-primary'])  !!}

      </div>
    </div>
  </div>
</div>
     
       

    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
