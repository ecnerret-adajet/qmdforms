@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                   Document Review& Distribution Request
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">

                 <table id="table-data" class="table nowrap display table-striped table-hover table_custom" width="100%">
                <thead>
                <tr>
                    <th>
                    Drdr No
                    </th>
                    <th>
                    Document Title
                    </th>
                    <th>
                    Reason of Request
                    </th>
                    <th>
                    Revision #
                    </th>
                    <th>
                    Reviewer Status
                    </th>
                    <th>
                    Approved Status
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($drdrforms as $drdrform)
                    <tr>
                        <td>
                        <a data-toggle="modal" data-target=".bs-show-drdrform-{{$drdrform->id}}-modal-lg" href="">
                        {{$drdrform->id}}
                        </a>
                        </td>
                        <td>
                        {{$drdrform->document_title}}
                        </td>
                        <td>
                        {{$drdrform->reason_request}}
                        </td>                       
                        <td>
                        {{$drdrform->revision_number}}
                        </td>
                        <td>
                        @forelse($drdrform->drdrreviewers as $drdrreviewer)
                            @foreach($drdrreviewer->statuses as $status)
                                @if($status->id == 1)
                              <button class="btn btn-primary btn-block disabled"> Approved </button>       
                                @else
                              <button class="btn btn-danger  btn-block disabled"> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <button class="btn btn-block btn-default">
                            Pending
                        </button>
                        @endforelse

                        </td>
                        <td>
                        @forelse($drdrform->drdrapprovers as $drdrapprover)
                            @foreach($drdrapprover->statuses as $status)
                                @if($status->id == 1)
                              <button class="btn btn-primary btn-block disabled"> Approved </button>       
                                @else
                              <button class="btn btn-danger  btn-block disabled"> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <button class="btn btn-block btn-default">
                            Pending
                        </button>
                        @endforelse
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
      

                </div>
            </div>
        </div>
    </div>
</div>




@foreach($drdrforms as $drdrform)
<!-- Show modal information -->
<div class="modal fade bs-show-drdrform-{{$drdrform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content" style="min-width: 850px;  margin-left: -80px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Document Review & Distribution Request: Detailed</h4>
      </div>
      <div class="modal-body">

    
      
      </div><!-- modal body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
@endforeach





@endsection
