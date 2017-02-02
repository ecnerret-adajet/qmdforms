@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                   Document Review & Distribution Request
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">

            <!-- table tab list -->
    <div class="tabbable-panel">
      <div class="tabbable-line">
        <ul class="nav nav-tabs tabtop  tabsetting">
          <li class="active"> <a href="#tab_default_1" data-toggle="tab"> Document Entries <span class="badge">{{$drdrforms->count()}}</span></a> </li>
          <li> <a href="#tab_default_2" data-toggle="tab"> Trashed Documents   <span class="badge">{{$drdrtrashed->count()}}</span></a> </li>
          <li> <a href="#tab_default_3" data-toggle="tab"> Archive Documents <span class="badge">{{$drdrarchive->count()}}</span></a> </li>
        </ul>
        <div class="tab-content margin-tops">
          <div class="tab-pane active fade in" id="tab_default_1">
            <div class="col-md-12">

                              <!-- table data -->

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
                    <th>
                    Option
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
                             <button class="btn btn-primary btn-block disabled"> <i class="ion-checkmark-circled"></i> Approved </button>   
                                @else
                               <button class="btn btn-danger  btn-block disabled"> <i class="ion-close-circled"></i> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <button class="btn btn-block btn-default">
                            <i class="ion-clock"></i> Pending
                        </button>
                        @endforelse

                        </td>
                        <td>
                        @forelse($drdrform->drdrapprovers as $drdrapprover)
                            @foreach($drdrapprover->statuses as $status)
                                @if($status->id == 1)
                              <button class="btn btn-primary btn-block disabled"> <i class="ion-checkmark-circled"></i> Approved </button>       
                                @else
                              <button class="btn btn-danger  btn-block disabled"> <i class="ion-close-circled"></i> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <button class="btn btn-block btn-default">
                           <i class="ion-clock"></i> Pending
                        </button>
                        @endforelse
                        </td>
                        <td>
                        <div class="btn-group">
                        <div class="btn-group">
                          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Option
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li>
                            <a data-toggle="modal" data-target=".bs-delete{{$drdrform->id}}-modal-lg" href="">
                               Move to trash
                            </a>
                            </li>
                            <li>
                            <a data-toggle="modal" data-target=".bs-archive{{$drdrform->id}}-modal-lg" href="">
                              Mark as archive
                            </a>
                            </li>
                            <li><a href="#">Cancel Document</a></li>
                           </ul>
                        </div>
                      </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>

              </div>
          </div>
          <div class="tab-pane fade" id="tab_default_2">
            <div class="col-md-12">


                <!-- table data -->
                 <table id="trashed-data" class="table nowrap display table-striped table-hover table_custom" width="100%">
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
                    <th>
                    Option
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($drdrtrashed as $drdrform)
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
                             <button class="btn btn-primary btn-block disabled"> <i class="ion-checkmark-circled"></i> Approved </button>   
                                @else
                               <button class="btn btn-danger  btn-block disabled"> <i class="ion-close-circled"></i> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <button class="btn btn-block btn-default">
                            <i class="ion-clock"></i> Pending
                        </button>
                        @endforelse

                        </td>
                        <td>
                        @forelse($drdrform->drdrapprovers as $drdrapprover)
                            @foreach($drdrapprover->statuses as $status)
                                @if($status->id == 1)
                              <button class="btn btn-primary btn-block disabled"> <i class="ion-checkmark-circled"></i> Approved </button>       
                                @else
                              <button class="btn btn-danger  btn-block disabled"> <i class="ion-close-circled"></i> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <button class="btn btn-block btn-default">
                           <i class="ion-clock"></i> Pending
                        </button>
                        @endforelse
                        </td>
                        <td>
                        <div class="btn-group">
                        <div class="btn-group">
                          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Option
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li>
                            <a data-toggle="modal" data-target=".bs-delete{{$drdrform->id}}-modal-lg" href="">
                               Move to trash
                            </a>
                            </li>
                            <li>
                            <a data-toggle="modal" data-target=".bs-archive{{$drdrform->id}}-modal-lg" href="">
                              Mark as archive
                            </a>
                            </li>
                            <li><a href="#">Cancel Document</a></li>
                           </ul>
                        </div>
                      </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                <!-- end table -->



              </div>
          </div>
          <div class="tab-pane fade" id="tab_default_3">
            <div class="col-md-12">

                <!-- table data -->
                 <table id="archive-data" class="table nowrap display table-striped table-hover table_custom" width="100%">
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
                    <th>
                    Option
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($drdrarchive as $drdrform)
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
                             <button class="btn btn-primary btn-block disabled"> <i class="ion-checkmark-circled"></i> Approved </button>   
                                @else
                               <button class="btn btn-danger  btn-block disabled"> <i class="ion-close-circled"></i> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <button class="btn btn-block btn-default">
                            <i class="ion-clock"></i> Pending
                        </button>
                        @endforelse

                        </td>
                        <td>
                        @forelse($drdrform->drdrapprovers as $drdrapprover)
                            @foreach($drdrapprover->statuses as $status)
                                @if($status->id == 1)
                              <button class="btn btn-primary btn-block disabled"> <i class="ion-checkmark-circled"></i> Approved </button>       
                                @else
                              <button class="btn btn-danger  btn-block disabled"> <i class="ion-close-circled"></i> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <button class="btn btn-block btn-default">
                           <i class="ion-clock"></i> Pending
                        </button>
                        @endforelse
                        </td>
                        <td>
                        <div class="btn-group">
                        <div class="btn-group">
                          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Option
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li>
                            <a data-toggle="modal" data-target=".bs-delete{{$drdrform->id}}-modal-lg" href="">
                               Move to trash
                            </a>
                            </li>
                            <li>
                            <a data-toggle="modal" data-target=".bs-archive{{$drdrform->id}}-modal-lg" href="">
                              Mark as archive
                            </a>
                            </li>
                            <li><a href="#">Cancel Document</a></li>
                           </ul>
                        </div>
                      </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                <!-- end table -->



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

      @include('drdrforms.details')

    
      
      </div><!-- modal body -->
      <div class="modal-footer">
        <a href="" data-toggle="modal" data-target=".bs-verify-drdrform-{{$drdrform->id}}-modal-lg" class="btn btn-primary pull-left">Verify Document</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    



    <!-- Verify modal information -->
    <div class="modal fade bs-verify-drdrform-{{$drdrform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog">
        <div class="modal-content" style="min-width: 850px;  margin-left: -80px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Management Verification</h4>
          </div>
          <div class="modal-body">

            <form class="form-horizontal" method="POST" action="{{url('drdrforms/drdrmr/'.$drdrform->id)}}" enctype="multipart\form-data">
            {!! csrf_field() !!}

                    @include('drdrforms.management')        
          
          </div><!-- modal body -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

           </form>

          </div>
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->    


          <!-- Document move to trash modal -->
        <div class="modal fade bs-delete{{$drdrform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
    
              {!! Form::open(['method' => 'DELETE', 'route' => ['drdrforms.destroy', $drdrform->id]]) !!}
              {!! csrf_field() !!}
                                                
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
        <div class="modal fade bs-archive{{$drdrform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
    
                        
             <form method="POST" action="{{  url('/drdrfomrs/archive/'.$drdrform->id ) }}">
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
