    @extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                    Dashboard
                    </strong>
                    <a class="btn btn-default" href="{{url('/home')}}">
                    Home
                    </a>
                    </h4>
                </div>

                <div class="panel-body">
                        
                <table class="table">
                <thead>
                    <tr>
                        <th>Forms</th>
                        <th>Entries</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <a href="{{url('drdrforms')}}">
                        Document Review & Distribution Request
                        </a>
                        </td>
                        <td>{{$drdrforms->count()}}</td>
                    </tr>
                    <tr>
                        <td>
                        <a href="{{url('ddrforms')}}">
                        Document Distribution Request
                        </a>
                        </td>
                        <td>{{$ddrforms->count()}}</td>
                    </tr>
                    <tr>
                        <td>
                         <a href="{{url('ncnforms')}}">
                        Non-conformance Notification
                        </a>
                        </td>
                        <td>{{$ncnforms->count()}}</td>
                    </tr>                    
                    <tr>
                        <td>
                         <a href="{{url('ccirforms')}}">
                        Customer Complaint Information Report
                        </a>
                        </td>
                        <td>{{$ccirforms->count()}}</td>
                    </tr>
                </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>

   <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                    Report Summary
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">
                        
              
                </div>
            </div>
        </div>
    </div>


       <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                    <strong>
                    Users Report
                    </strong>
                    </h4>
                </div>

                <div class="panel-body">
                        
              
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
