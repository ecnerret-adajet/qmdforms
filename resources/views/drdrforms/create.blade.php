@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Document Review & Distribution Request</div>
                <div class="panel-body">

       {!! Form::model($drdrform = new \App\Drdrform, ['class' => 'form-horizontal', 'url' => 'drdrforms', 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
				{!! csrf_field() !!}


	@include('drdrforms.form', ['submitButtonText' => 'Submit'])


	
                    

     
       

    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
