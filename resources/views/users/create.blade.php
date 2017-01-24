@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4>
                <strong>
                Create User
                </strong>
                </h4>
                </div>
                <div class="panel-body">

       {!! Form::model($user = new \App\User, ['class' => 'form-horizontal', 'url' => 'users', 'files' => 'true', 'enctype' => 'multipart\form-data']) !!}
				{!! csrf_field() !!}


	@include('users.form', ['submitButtonText' => 'Submit'])

            
    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
