@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Document Distribution Request</div>
                <div class="panel-body">

@if (count($errors) > 0)
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh snap!</strong> Please check for empty fields and submit again.
</div>
@endif

       {!! Form::model($ddrform = new \App\Ddrform, ['class' => 'form-horizontal', 'url' => 'ddrforms', 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
				{!! csrf_field() !!}


	@include('ddrforms.form', ['submitButtonText' => 'Submit'])

            
    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection

@yield('ddrform_list')