@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Document Review & Distribution Request : Approver</div>
                <div class="panel-body">


                <table  width="100%">
                        <tr>
                            <td>    
                                Company
                            </td>
                            <td>
                                @foreach($drdrform->companies as $company)
                                    {{$company->name}}
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <td>    
                                Type of request
                            </td>
                            <td>
                                @foreach($drdrform->types as $type)
                                    {{$type->name}}
                                @endforeach
                            </td>
                        </tr>  

                        <tr>
                            <td>    
                                Document Tile
                            </td>
                            <td>
                                {{$drdrform->document_title}}
                            </td>
                        </tr> 


                        <tr>
                            <td>    
                                Reason of request
                            </td>
                            <td>
                                {{$drdrform->reason_request}}
                            </td>
                        </tr> 


                        <tr>
                            <td>    
                               Requested By:
                            </td>
                            <td>
                                {{$drdrform->name}}
                            </td>
                        </tr> 


                        <tr>
                            <td>    
                               Date of request
                            </td>
                            <td>
                                {{ date('F d, Y', strtotime($drdrform->date_request))}}
                            </td>
                        </tr> 

                        <tr>
                            <td>    
                         Reviewed By:
                            </td>

                            <td>
                            @foreach($drdrform->drdrreviewers as $reviewer)
                                {{$reviewer->name}}
                            @endforeach
                            </td>   

                        </tr>   

                         <tr>
                            <td>    
                         Reviewed Date:
                            </td>

                            <td>
                            @foreach($drdrform->drdrreviewers as $reviewer)
                                {{ date('F d, Y', strtotime($reviewer->date_review)) }}
                            @endforeach
                            </td>   

                        </tr>   



                        <tr>
                            <td colspan="2">
                            @foreach($drdrform->drdrreviewers->take(1) as $reviewer)
                            <a href="{{  str_replace('public/','storage/app/',asset($reviewer->attach_file)) }}" class="btn btn-block btn-primary" download> 
                                Download Attachment 
                             </a>
                            @endforeach
                            </td>
                        </tr> 

              </table>




           <hr/>     

       {!! Form::model($drdrapprover = new \App\Drdrapprover, ['class' => 'form-horizontal', 'url' => 'drdrforms/approver/'.$drdrform->id, 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
        {!! csrf_field() !!}


	@include('drdrforms.approver-form', ['submitButtonText' => 'Submit'])
                    
     
       

    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
