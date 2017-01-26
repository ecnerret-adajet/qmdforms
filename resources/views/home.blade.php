@extends('layouts.app')

@section('content')
<div class="container">
  <div class="jumbotron">
    <h1>QMD E-Form</h1> 
  </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">All Forms</div>

                <div class="panel-body">

                        <div class="row">
                            <div class="col-md-3 text-center" >
                                <i class="ion-ios-browsers-outline" style="font-size: 50px; color: #2980b9"></i>
                                <p style="line-height: 1.3em">
                                <a href="{{url('drdrforms/create')}}">
                                    <strong>
                                    Document Review & Distribution Request
                                    </strong>
                                </a>
                                </p>
                                <span>
                                     is the process of control in proposal, revision or cancellation of documents.
                                </span>
                            </div>

                            <div class="col-md-3 text-center" >
                                <i class="ion-ios-bookmarks-outline" style="font-size: 50px; color: #2980b9"></i>
                                <p style="line-height: 1.3em">
                                <a href="{{url('ddrforms/create')}}">
                                    <strong>
                                    Document Distribution Request
                                    </strong>
                                </a>
                                </p>
                                <span>
                                   pertains to the process of requesting up to distribution of controlled and/or uncontrolled copy of documents to both internal.
                                </span>
                            </div>


                            <div class="col-md-3 text-center" >
                                <i class="ion-ios-paper-outline" style="font-size: 50px; color: #2980b9"></i>
                                <p style="line-height: 1.3em">
                                <a href="{{url('ccirforms/create')}}">
                                    <strong>
                                    Customer Complaint Information Report
                                    </strong>
                                </a>
                                </p>
                                <span>
                                    is the process of verifying a non-conformance (either valid or invalid) up to implementation of applicable correction and corrective action.
                                </span>
                            </div>

                            <div class="col-md-3 text-center" >
                                <i class="ion-ios-flag-outline" style="font-size: 50px; color: #2980b9"></i>
                                <p style="line-height: 1.3em">
                                <a href="{{url('ncnforms/create')}}">
                                    <strong>
                                    Non-conformance Notification
                                    </strong>
                                </a>
                                </p>
                                <span>
                                    is the issuance of notice to responsible office / person due to non-fulfillment of a requirement/s.
                                </span>
                            </div>

                        </div>
                               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
