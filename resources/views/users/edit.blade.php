@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4>
                <strong>
                Update User
                </strong>
                </h4>
                </div>
                <div class="panel-body">

   
    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id], 'class' => 'form-horizontal' , 'enctype'=>'multipart/form-data']) !!}
     {!! csrf_field() !!}


	@include('users.form', ['submitButtonText' => 'Submit'])

            
    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
