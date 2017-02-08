@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Document Review & Distribution Request : Reviewer</div>
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
                               Requester
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
                                {{$drdrform->date_request}}
                            </td>
                        </tr> 

                        <tr>
                            <td colspan="2">
                            <a href="{{asset('http://172.17.2.88/qmdforms/storage/app/'.$drdrform->attach_file)}}" class="btn btn-primary btn-block" download>  
                                Download Attachement
                            </a>  

                            </td>
                        </tr> 

              </table>




           <hr/>     

       {!! Form::model($drdrreviewer = new \App\Drdrreviewer, ['class' => 'form-horizontal', 'url' => 'drdrforms/reviewer/'.$drdrform->id, 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
        {!! csrf_field() !!}


	@include('drdrforms.reviewer-form', ['submitButtonText' => 'Submit'])
                    
     
       

    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
