@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">


                <div class="panel-heading">
                    <h4>
                    <strong>
                   Reviewed Forms
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">


    <div class="tabbable-panel">
      <div class="tabbable-line">

        <ul class="nav nav-tabs tabtop  tabsetting">
          <li class="active"> <a href="#tab_default_1" data-toggle="tab"> DRDR FORMS </a> </li>
          <li> <a href="#tab_default_2" data-toggle="tab"> DDR FORMS </a> </li>
          <li> <a href="#tab_default_3" data-toggle="tab"> NCN FORMS </a> </li>
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

                </tr>
                </thead>
                <tbody>
                @foreach($drdrformsreviewed as $drdrform)
                    <tr>
                        <td>
                        <a href="{{url('drdrforms/'.$drdrform->id)}}">
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
                        @forelse($drdrform->drdrreviewers->take(1) as $drdrreviewer)
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
                        @forelse($drdrform->drdrapprovers->take(1) as $drdrapprover)
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
                        



                    </tr>
                @endforeach
                </tbody>
                </table>

              </div>
          </div>


          <div class="tab-pane fade" id="tab_default_2">
            <div class="col-md-12">

            
          <!-- table data -->

            <table id="table-data2" class="table nowrap display table-striped table-hover table_custom" width="100%">
                <thead>
                <tr>
                    <th>
                    Ddr No
                    </th>
                    <th>
                    Requester
                    </th>
                    <th>
                    Position
                    </th>
                    <th>
                    Date Needed
                    </th>
                    <th>
                    Date Requester
                    </th>
                    <th>
                    Approver Status
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($ddrformsreviewed as $ddrform)
                    <tr>
                        <td>
                        <a href="{{url('ddrforms/'.$ddrform->id)}}">
                        {{$ddrform->id}}
                        </a>
                        </td>
                        <td>
                        {{$ddrform->name}}
                        </td>
                        <td>
                        {{$ddrform->position}}
                        </td>                       
                        <td>
                        {{$ddrform->date_needed}}
                        </td>
                        <td>
                        {{$ddrform->date_requested}}
                        </td>
                        <td>
                        @forelse($ddrform->ddrapprovers->take(1) as $ddrapprover)
                            @foreach($ddrapprover->statuses as $status)
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

        
         <!-- end table data -->


              </div>
          </div>


          <!--- ncn forms -->

                    <div class="tab-pane fade" id="tab_default_3">
            <div class="col-md-12">

            
          <!-- table data -->
            <table id="table-data3" class="table nowrap display table-striped table-hover table_custom" width="100%">
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
                    <th>
                    Notified Status
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($ncnformsreviewed as $ncnform)
                    <tr>
                        <td>
                        <a href="{{url('ncnforms/'.$ncnform->id)}}"> 
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
                        @forelse($ncnform->ncnapprovers->take(1) as $ncnapprover)
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
                        @forelse($ncnform->ncnnotifieds->take(1) as $notified)
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
                    </tr>
                @endforeach
                </tbody>
                </table>

        
         <!-- end table data -->


              </div>
          </div>

          <!-- end ncnforms -->


        <!--- ccir forms -->



          <!-- end ccirforms -->





        
        </div><!-- table content -->
      </div><!-- table line -->
    </div><!-- table panel -->
      

                </div><!-- end panel body-->
            </div><!-- panel-default -->
        </div><!-- end col-md-11 -->
    </div><!-- end row -->
</div><!-- end container -->








@endsection
