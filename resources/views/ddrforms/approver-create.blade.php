@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Document Distribution Request : Approver</div>
                <div class="panel-body">


                <table  width="100%">
                        <tr>
                            <td>    
                                Department
                            </td>
                            <td>
                                @foreach($ddrform->departments as $department)
                                    {{$department->name}}
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <td>    
                                Reason of distribution
                            </td>
                            <td>
                                {{$ddrform->reason_distribution}}
                            </td>
                        </tr>  

                        <tr>
                            <td>    
                               Date of request
                            </td>
                            <td>
                                {{ $ddrform->date_requested }}
                            </td>
                        </tr> 


                        <tr>
                            <td>    
                                Date Needed
                            </td>
                            <td>
                                {{$ddrform->date_needed}}
                            </td>
                        </tr> 


                        <tr>
                            <td>    
                               Requested By:
                            </td>
                            <td>
                                {{$ddrform->name}}
                            </td>
                        </tr> 


                        <tr>
                            <td>    
                               Position
                            </td>
                            <td>
                                {{$ddrform->position}}
                            </td>
                        </tr> 

              </table>

              <table class="table table-bordered table-striped table-hover" style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>Document Title</th>
                            <th>Control Code</th>
                            <th>Copy #</th>
                            <th>Copy holder</th>
                            <th>Received by</th>
                            <th>date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ddrform->ddrlists as $ddrlist)
                        <tr>
                        <td>
                            {{$ddrlist->document_title}}
                        </td>
                        <td>
                            {{$ddrlist->control_code}}
                        </td>
                        <td>
                            {{$ddrlist->copy_no}}
                        </td>
                        <td>
                            {{$ddrlist->copy_holder}}
                        </td>
                        <td>
                            {{$ddrlist->recieved_by}}
                        </td>
                        <td>
                            {{$ddrlist->date_list}}
                        </td>                        
                        </tr>
                        @endforeach
                    </tbody>
              </table>




           <hr/>     

       {!! Form::model($ddrapprover = new \App\Ddrapprover, ['class' => 'form-horizontal', 'url' => 'ddrforms/approver/'.$ddrform->id, 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
        {!! csrf_field() !!}


	@include('ddrforms.approver-form', ['submitButtonText' => 'Submit'])
                    
     
       

    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
