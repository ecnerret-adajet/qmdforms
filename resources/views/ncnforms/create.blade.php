@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Non-conformance Notification</div>
                <div class="panel-body">

       {!! Form::model($ncnform = new \App\Ncnform, ['class' => 'form-horizontal', 'url' => 'ncnforms', 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
				{!! csrf_field() !!}


	@include('ncnforms.form', ['submitButtonText' => 'Submit'])

            
    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
