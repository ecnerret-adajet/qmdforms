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
        <!-- tab table start -->
    <div class="tabbable-panel">
      <div class="tabbable-line">
        <ul class="nav nav-tabs tabtop  tabsetting">
          <li class="active"> <a href="#tab_default_1" data-toggle="tab"> Document Entries </a> </li>
        </ul>
        <div class="tab-content margin-tops">
          <div class="tab-pane active fade in" id="tab_default_1">
            <div class="col-md-12">

                              <!-- table data -->
            <table id="table-data" class="table nowrap display table-striped table-hover table_custom" width="100%">
                <thead>
                <tr>
                    <th>
                    #
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
                    <th>
                    Notified Status
                    </th>

<!--                      <th>
                    Option
                    </th> -->

                </tr>
                </thead>
                <tbody>
                @foreach($ncnnotifieds  as  $notified)

                    <tr>
                        <td>
                         <a href="{{url('ncnforms/'.$notified->ncnform->id)}}">
                        {{$notified->ncnform->id}}
                        </a>
                        </td>
                        <td>
                        {{   str_limit($notified->ncnform->name, 10)}}
                        </td>
                        <td>
                        {{   str_limit($notified->ncnform->position, 15)}}
                        </td>                       
                        <td>
                        {{$notified->ncnform->notif_number}}
                        </td>
                        <td>
                        {{ date('M d, Y', strtotime($notified->ncnform->date_issuance)) }}  
                        </td>
                        <td>
                        @forelse($notified->ncnform->ncnapprovers->take(1) as $ncnapprover)
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

                      <td>
                        @forelse($notified->ncnform->ncnnotifieds->take(1) as $notified)
                                @if(!empty($notified))
                              <button class="btn btn-primary btn-block disabled">  Done </button>       
                                @else
                              <button class="btn btn-danger  btn-block disabled"> Disapproved </button> 
                              @endif   

                        @empty
                           <button class="btn btn-block btn-default">
                            Pending
                        </button>
                        @endforelse

                      </td>

<!--                         <td>
                        <div class="btn-group">
                        <div class="btn-group">
                          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Option
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li>
                            <a data-toggle="modal" data-target=".bs-delete{{$notified->ncnform->id}}-modal-lg" href="">
                               Move to trash
                            </a>
                            </li>
                            <li>
                            <a data-toggle="modal" data-target=".bs-archive{{$notified->ncnform->id}}-modal-lg" href="">
                              Mark as archive
                            </a>
                            </li>
                            <li><a href="#">Cancel Document</a></li>
                           </ul>
                        </div>
                      </div>
                        </td> -->
                    </tr>





                @endforeach
                </tbody>
                </table>
                <!-- end tab table -->
              </div>
          </div>



        
        </div><!-- table content -->
      </div><!-- table line -->
    </div><!-- table panel -->

                 
      

                </div>
            </div>
        </div>
    </div>
</div>




 @foreach($ncnnotifieds as $notified)
<!-- Show modal information -->
<div class="modal fade bs-show-ncnform-{{$notified->ncnform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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



          <!-- Document move to trash modal -->
        <div class="modal fade bs-delete{{$notified->ncnform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Move to trash</h4>
              </div>
              <div class="modal-body">
                      <div class="row">
                <div class="col-md-12">
                <div class="panel-body text-center"> 
            
                <h4>  
                    Are you sure you want to trash this Document ?
                </h4>
    
              {!! Form::open(['method' => 'DELETE', 'route' => ['ncnforms.destroy', $notified->ncnform->id]]) !!}
              {!! csrf_field() !!}
              <input type="hidden" name="_method" value="DELETE">   
                                                
            </div>
                </div>
            </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
                  
                   
              </div>
             {!! Form::close() !!}
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->      




 <!-- archive a company modal -->
        <div class="modal fade bs-archive{{$notified->ncnform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Move to Archive</h4>
              </div>
              <div class="modal-body">
                      <div class="row">
                <div class="col-md-12">
                <div class="panel-body text-center"> 
            
                <h4>  
                    Are you sure you want to Archive this Document ?
                </h4>
    
                        
             <form method="POST" action="{{ url('/ncnforms/archive/'.$notified->ncnform->id) }}">
              {!! csrf_field() !!}
                                                
            </div>
                </div>
            </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
                  
                   
              </div>
              </form> 
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->      
@endforeach




@endsection
