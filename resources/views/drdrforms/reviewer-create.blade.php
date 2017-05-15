@extends('layouts.app')

@section('content')



@forelse($drdrform->drdrreviewers->take(1) as $drdrreviewer)
@foreach($drdrreviewer->statuses as $status)
@if($status->id == 1)


<div class="container">
<div class="row">
<div class="col-md-12 text-center">
        <h1>This request is already reviewed</h1>
</div>
</div>
</div>  



@else


<div class="container">
<div class="row">
<div class="col-md-12 text-center">
        <h1>This request is disapproved!</h1>
</div>
</div>
</div> 




@endif   
@endforeach
@empty


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
                                {{$drdrform->date_request}}
                            </td>
                        </tr> 

                        <tr>
                            <td colspan="2">
                                  <a href="{{  str_replace('public/','storage/app/',asset($drdrform->attach_file)) }}" class="btn btn-block btn-primary" download> 
                                        Download Attachment 
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



@endforelse






@endsection
