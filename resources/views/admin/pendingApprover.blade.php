@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                   Pending Request for approval
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">


    <div class="tabbable-panel">
      <div class="tabbable-line">
        <ul class="nav nav-tabs tabtop  tabsetting">
          <li class="active"> <a href="#tab_default_1" data-toggle="tab"> Drdr Forms <span class="badge">{{$drdrformsown->count()}}</span></a> </li>
          <li> <a href="#tab_default_2" data-toggle="tab"> Ddr Forms <span class="badge">{{$ddrformsown->count()}}</span></a> </li>
          <li> <a href="#tab_default_3" data-toggle="tab"> Ncn Forms <span class="badge">{{$ncnformsown->count()}}</span></a> </li>
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
                    Approved Status
                    </th>

                </tr>
                </thead>
                <tbody>


                @foreach($drdrformsown as $drdrform)
                    <tr>
                        <td>
                        <a href="{{url('drdrforms/'.$drdrform->id)}}">
                        {{$drdrform->id}}
                        </a>
                        </td>
                        <td>
                        {{  str_limit($drdrform->document_title, 15) }}
                        </td>
                        <td>
                         {{  str_limit($drdrform->reason_request, 15) }}
                        </td>                       
                        <td>
                        {{$drdrform->revision_number}}
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
                        <a class="btn btn-block btn-default" href="{{url('/drdrforms/approver/create/'.$drdrform->id)}}">
                            <i class="ion-clock"></i> Click for approval
                            </a>
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
                @foreach($ddrformsown as $ddrform)
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
                             {{  str_limit($ddrform->position, 15) }}
                        </td>                       
                        <td>
                        {{$ddrform->date_needed}}
                        </td>
                        <td>
                        {{$ddrform->date_requested}}
                        </td>
                        <td>
                        @forelse($ddrform->ddrapprovers as $ddrapprover)
                            @foreach($ddrapprover->statuses as $status)
                                @if($status->id == 1)
                              <button class="btn btn-primary btn-block disabled"> Approved </button>       
                                @else
                              <button class="btn btn-danger  btn-block disabled"> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                                <a class="btn btn-block btn-default" href="{{url('/ddrforms/approver/create/'.$ddrform->id)}}">
                            <i class="ion-clock"></i> Click for approval
                            </a>
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

                </tr>
                </thead>
                <tbody>
                @foreach($ncnformsown as $ncnform)
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
                        @forelse($ncnform->ncnapprovers as $ncnapprover)
                            @foreach($ncnapprover->statuses as $status)
                                @if($status->id == 1)
                              <button class="btn btn-primary btn-block disabled"> Approved </button>       
                                @else
                              <button class="btn btn-danger  btn-block disabled"> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                               <a class="btn btn-block btn-default" href="{{url('/ncnforms/approver/create/'.$ncnform->id)}}">
                            <i class="ion-clock"></i> Click for approval
                            </a>
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


     


              </div>
          </div>

          <!-- end ccirforms -->





        
        </div><!-- table content -->
      </div><!-- table line -->
    </div><!-- table panel -->
      

                </div>
            </div>
        </div>
    </div>
</div>








@endsection
