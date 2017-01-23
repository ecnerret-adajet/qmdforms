@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4>
                <strong>
                Customer Complaint Information Report
                </strong>
                </h4>
                </div>
                <div class="panel-body">

       {!! Form::model($ccirform = new \App\Ccirform, ['class' => 'form-horizontal', 'url' => 'ccirforms', 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
				{!! csrf_field() !!}


	@include('ccirforms.form', ['submitButtonText' => 'Submit'])

            
    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
