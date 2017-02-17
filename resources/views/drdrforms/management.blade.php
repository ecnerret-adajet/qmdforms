<div class="row {{ $errors->has('drdr_no') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('drdr_no', 'Drdr No:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('drdr_no', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('drdr_no'))
<span class="help-block">
<strong>{{ $errors->first('drdr_no') }}</strong>
</span>
@endif
</div>
</div>


<div class="row {{ $errors->has('document_title') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('document_title', 'Document Title:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('document_title', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('document_title'))
<span class="help-block">
<strong>{{ $errors->first('document_title') }}</strong>
</span>
@endif
</div>
</div>



<div class="row {{ $errors->has('document_code') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('document_code', 'Document Code:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('document_code', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('document_code'))
<span class="help-block">
<strong>{{ $errors->first('document_code') }}</strong>
</span>
@endif
</div>
</div>


<div class="row {{ $errors->has('revision_number') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('revision_number', 'Revision Number:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('revision_number', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('revision_number'))
<span class="help-block">
<strong>{{ $errors->first('revision_number') }}</strong>
</span>
@endif
</div>
</div>
