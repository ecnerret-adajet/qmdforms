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

                          <!-- tab table start -->
    <div class="tabbable-panel">
      <div class="tabbable-line">
        <ul class="nav nav-tabs tabtop  tabsetting">
          <li class="active"> <a href="#tab_default_1" data-toggle="tab"> Document Entries <span class="badge">{{$ccirforms->count()}}</span></a> </li>
          <li> <a href="#tab_default_2" data-toggle="tab"> Trashed Documents   <span class="badge">{{$ccirtrashed->count()}}</span></a> </li>
          <li> <a href="#tab_default_3" data-toggle="tab"> Archive Documents <span class="badge">{{$ccirarchive->count()}}</span></a> </li>
        </ul>
        <div class="tab-content margin-tops">
          <div class="tab-pane active fade in" id="tab_default_1">
            <div class="col-md-12">

                              <!-- table data -->
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
                    <th>
                    Option
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($ccirforms as $ccirform)
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

                        <td>
                        <div class="btn-group">
                        <div class="btn-group">
                          <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Option
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li>
                            <a data-toggle="modal" data-target=".bs-delete{{$ccirform->id}}-modal-lg" href="">
                               Move to trash
                            </a>
                            </li>
                            <li>
                            <a data-toggle="modal" data-target=".bs-archive{{$ccirform->id}}-modal-lg" href="">
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
          <div class="tab-pane fade" id="tab_default_2">
            <div class="col-md-12">


                <!-- table data -->
<table id="trashed-data" class="table nowrap display table-striped table-hover table_custom" width="100%">
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
                @foreach($ccirtrashed as $ccirform)
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
                @foreach($ccirarchive as $ccirform)
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


          <!-- Document move to trash modal -->
        <div class="modal fade bs-delete{{$ccirform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
    
              {!! Form::open(['method' => 'DELETE', 'route' => ['ccirforms.destroy', $ccirform->id]]) !!}
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
        <div class="modal fade bs-archive{{$ccirform->id}}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
    
                        
             <form method="POST" action="{{ url('/ccirforms/archive/'.$ccirform->id) }}">
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
