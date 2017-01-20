<div class="form-group{{ $errors->has('type_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('type_list', 'Type of request:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('type_list', $types, null, ['class' => 'form-control', 'placeholder' => '--- Select Type of request ---'] ) !!}
@if ($errors->has('type_list'))
<span class="help-block">
<strong>{{ $errors->first('type_list') }}</strong>
</span>
@endif
</div>
</div>




<div class="form-group{{ $errors->has('company_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('company_list', 'Company:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('company_list', $companies, null, ['class' => 'form-control', 'placeholder' => '--- Select Company ---'] ) !!}
@if ($errors->has('company_list'))
<span class="help-block">
<strong>{{ $errors->first('company_list') }}</strong>
</span>
@endif
</div>
</div>



<div class="form-group{{ $errors->has('document_title') ? ' has-error' : '' }}">
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


<div class="form-group{{ $errors->has('reason_request') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('reason_request', 'Reason of Request:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::textarea('reason_request', null, ['class' => 'form-control', 'rows' => '3'] ) !!}
@if ($errors->has('reason_request'))
<span class="help-block">
<strong>{{ $errors->first('reason_request') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('revision_number') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('revision_number', 'Revision number:') !!}
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


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('name', 'Requester:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'disabled'] ) !!}
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>


  <div class="form-group{{ $errors->has('attach_file') ? ' has-error' : '' }}">
  <div class="col-md-12">
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


<div class="form-group{{ $errors->has('user_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('user_list', 'Reviewer:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('user_list', $users, null, ['class' => 'form-control', 'placeholder' => '--- Select Reviewer ---'] ) !!}
@if ($errors->has('user_list'))
<span class="help-block">
<strong>{{ $errors->first('user_list') }}</strong>
</span>
@endif
</div>
</div>


<!-- submit or cancel button section -->

    </div>
      <div class="panel-footer">
      			<div class="row">
      <div class="col-md-6">
        <button type="reset" class="btn btn-default btn-block">Cancel</button>
      </div>

      <div class="col-md-6">
        <input type="button" class="btn btn-primary btn-block pull-right" value="Submit" data-toggle="modal" data-target="#myModal">
    </div>
    </div>


      </div>
            </div>




 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm Changes</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to save changes? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

         {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary'])  !!}

      </div>
    </div>
  </div>
</div>