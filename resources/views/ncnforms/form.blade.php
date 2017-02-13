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


<div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('position', 'Position:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('position', Auth::user()->position, ['class' => 'form-control', 'disabled'] ) !!}
@if ($errors->has('position'))
<span class="help-block">
<strong>{{ $errors->first('position') }}</strong>
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


<div class="form-group{{ $errors->has('department_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('department_list', 'Department:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('department_list', $departments, null, ['class' => 'form-control', 'placeholder' => '--- Select Company ---'] ) !!}
@if ($errors->has('department_list'))
<span class="help-block">
<strong>{{ $errors->first('department_list') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('nonconformity_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('nonconformity_list', 'Type of Non-conformity:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('nonconformity_list', $nonconformities, null, ['class' => 'form-control', 'placeholder' => '--- Select Company ---'] ) !!}
@if ($errors->has('nonconformity_list'))
<span class="help-block">
<strong>{{ $errors->first('nonconformity_list') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('notif_number') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('notif_number', 'Notification Number:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('notif_number', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('notif_number'))
<span class="help-block">
<strong>{{ $errors->first('notif_number') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('recurrence_no') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('recurrence_no', 'Recurrence No:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('recurrence_no', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('recurrence_no'))
<span class="help-block">
<strong>{{ $errors->first('recurrence_no') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('date_issuance') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('date_issuance', 'Date of issuance:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::input('date','date_issuance', $ncnform->date_issuance->format('Y-m-d'), ['class' => 'form-control'] ) !!}
@if ($errors->has('date_issuance'))
<span class="help-block">
<strong>{{ $errors->first('date_issuance') }}</strong>
</span>
@endif
</div>
</div>



<div class="form-group{{ $errors->has('user_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('user_list', 'Notified Person:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('user_list', $users, null, ['class' => 'form-control', 'placeholder' => '--- Select Company ---'] ) !!}
@if ($errors->has('user_list'))
<span class="help-block">
<strong>{{ $errors->first('user_list') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('details_non_conformity') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('details_non_conformity', 'Details of Non-conformity:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::textarea('details_non_conformity', null, ['class' => 'form-control','rows' => '3'] ) !!}
@if ($errors->has('details_non_conformity'))
<span class="help-block">
<strong>{{ $errors->first('details_non_conformity') }}</strong>
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