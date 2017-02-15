@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                   Form Submitted
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
          <li> <a href="#tab_default_4" data-toggle="tab"> Ccir Forms <span class="badge">{{$ccirformsown->count()}}</span></a> </li>
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
                @foreach($drdrformsown as $drdrform)
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
                        {{$ddrform->position}}
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

                    <div class="tab-pane fade" id="tab_default_4">
            <div class="col-md-12">

            
          <!-- table data -->
          <table id="table-data4" class="table nowrap display table-striped table-hover table_custom" width="100%">
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
                @foreach($ccirformsown as $ccirform)
                    <tr>
                        <td>
                        <a href="{{url('ccirforms/'.$ccirform->id)}}">
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

        
         <!-- end table data -->


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
