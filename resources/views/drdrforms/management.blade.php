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


<div class="row {{ $errors->has('effective_date') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('effective_date', 'Effective Date:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::input('date', 'effective_date', Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control'] ) !!}
@if ($errors->has('effective_date'))
<span class="help-block">
<strong>{{ $errors->first('effective_date') }}</strong>
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


<div class="row {{ $errors->has('attach_file') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
  Attach file
</label>
</div>

<div class="col-md-12">
  <input name="attach_file" type="file" class="filestyle" data-size="sm" data-buttonName="btn-primary" data-buttonBefore="true">
@if ($errors->has('attach_file'))
<span class="help-block">
<strong>{{ $errors->first('attach_file') }}</strong>
</span>
@endif
</div>
</div>