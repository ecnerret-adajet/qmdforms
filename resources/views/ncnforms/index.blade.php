@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                   Non-conformance Notification
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">

                 <table id="table-data" class="table nowrap display table-striped table-hover table_custom" width="100%">
                <thead>
                <tr>
                    <th>
                    Ncn No
                    </th>
                    <th>
                    Requester
                    </th>
                    <th>
                    Position
                    </th>
                    <th>
                    Notificaiton #
                    </th>
                    <th>
                    Date Issuance
                    </th>
                    <th>
                    Approver Status
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($ncnforms as $ncnform)
                    <tr>
                        <td>
                        <a data-toggle="modal" data-target=".bs-show-ncnform-{{$ncnform->id}}-modal-lg" href="">
                        {{$ncnform->id}}
                        </a>
                        </td>
                        <td>
                        {{$ncnform->name}}
                        </td>
                        <td>
                        {{$ncnform->position}}
                        </td>                       
                        <td>
                        {{$ncnform->notif_number}}
                        </td>
                        <td>
                        {{$ncnform->date_issuance}}
                        </td>
                        <td>
                        @forelse($ncnform->ncnapprovers as $ncnapprover)
                            @foreach($ncnapprover->statuses as $status)
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




@foreach($ncnforms as $ncnform)
<!-- Show modal information -->
<div class="modal fade bs-show-ncnform-{{$ncnform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content" style="min-width: 850px;  margin-left: -80px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Document Distribution Request: Detailed</h4>
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
