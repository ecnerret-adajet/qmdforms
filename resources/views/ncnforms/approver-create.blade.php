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
                            <a href="{{  str_replace('public/','storage/app/',asset($ncnform->attach_file)) }}" class="btn btn-block btn-primary" download> 
                                Download Attachement 
                             </a>
                            </td>
                        </tr> 





              </table>


           <hr/>     

       {!! Form::model($ncnapprover = new \App\Ncnapprover, ['class' => 'form-horizontal', 'url' => 'ncnforms/approver/'.$ncnform->id, 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
        {!! csrf_field() !!}



	@include('ncnforms.approver-form', ['submitButtonText' => 'Submit'])
                    
     
       

    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
