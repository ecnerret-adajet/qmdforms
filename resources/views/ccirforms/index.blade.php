@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                   Customer Complaint Information Report
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">

                 <table id="table-data" class="table nowrap display table-striped table-hover table_custom" width="100%">
                <thead>
                <tr>
                    <th>
                    Ccir No
                    </th>
                    <th>
                        Requester
                    </th>
                    <th>
                      Customer Reference
                    </th>
                    <th>
                       Brand Name
                    </th>
                    <th>
                      Date issuance
                    </th>
                    <th>
                    Date delivery
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($ccirforms as $ccirform)
                    <tr>
                        <td>
                        <a data-toggle="modal" data-target=".bs-show-ccirform-{{$ccirform->id}}-modal-lg" href="">
                        {{$ccirform->id}}
                        </a>
                        </td>
                        <td>
                        {{$ccirform->name}}
                        </td>
                        <td>
                        {{$ccirform->customer_reference}}
                        </td>                       
                        <td>
                        {{$ccirform->brand_name}}
                        </td>
                        <td>
                        {{$ccirform->date_issuance}}
                        </td>
                        <td>
                        {{$ccirform->date_delivery}}
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




@foreach($ccirforms as $ccirform)
<!-- Show modal information -->
<div class="modal fade bs-show-ccirform-{{$ccirform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
