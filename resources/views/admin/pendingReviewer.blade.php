@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                  Pending For Review Request
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">


    <div class="tabbable-panel">
      <div class="tabbable-line">
        <ul class="nav nav-tabs tabtop  tabsetting">
          <li class="active"> <a href="#tab_default_1" data-toggle="tab"> Drdr Forms <span class="badge">{{$drdrformsown->count()}}</span></a> </li>
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
                        @forelse($drdrform->drdrreviewers as $drdrreviewer)
                            @foreach($drdrreviewer->statuses as $status)
                                @if($status->id == 1)
                             <button class="btn btn-primary btn-block disabled"> 
                                    <i class="ion-checkmark-circled"></i> 
                                    Approved 
                              </button>  
                                @else
                               <button class="btn btn-danger  btn-block disabled"> <i class="ion-close-circled"></i> Disapproved </button> 
                              @endif   
                                @endforeach
                                @empty
                           <a class="btn btn-block btn-default" href="{{url('/drdrforms/reviewer/create/'.$drdrform->id)}}">
                            <i class="ion-clock"></i> Click to review
                            </a>
                        @endforelse

                        </td>   
                    </tr>
                @endforeach
                </tbody>



                </table>

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








@endsection
