@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Document Distribution Request</div>
                <div class="panel-body">

       {!! Form::model($ddrform = new \App\Ddrform, ['class' => 'form-horizontal', 'url' => 'ddrforms', 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
				{!! csrf_field() !!}


	@include('ddrforms.form', ['submitButtonText' => 'Submit'])

            
    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
