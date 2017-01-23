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
                        <td>Document Review & Distribution Request</td>
                        <td>{{$drdrforms->count()}}</td>
                    </tr>
                    <tr>
                        <td>Document Distribution Request</td>
                        <td>{{$ddrforms->count()}}</td>
                    </tr>
                    <tr>
                        <td>Non-conformance Notification</td>
                        <td>{{$ncnforms->count()}}</td>
                    </tr>                    
                    <tr>
                        <td>Customer Complaint Information Report</td>
                        <td>{{$ccirforms->count()}}</td>
                    </tr>
                </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
