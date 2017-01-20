<div class="form-group{{ $errors->has('department_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('department_list', 'Departments:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('department_list', $departments, null, ['class' => 'form-control', 'placeholder' => '--- Select Department ---'] ) !!}
@if ($errors->has('department_list'))
<span class="help-block">
<strong>{{ $errors->first('department_list') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('reason_distribution') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('reason_distribution', 'Reason of distribution:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::textarea('reason_distribution', null, ['class' => 'form-control','rows' => '3'] ) !!}
@if ($errors->has('reason_distribution'))
<span class="help-block">
<strong>{{ $errors->first('reason_distribution') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('date_needed') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('date_needed', 'Date needed:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::input('date', 'date_needed', $ddrform->date_needed->format('Y-m-d'), ['class' => 'form-control'] ) !!}
@if ($errors->has('date_needed'))
<span class="help-block">
<strong>{{ $errors->first('date_needed') }}</strong>
</span>
@endif
</div>
</div>


<table class="table table-striped table-bordered table-hover" width="100%">	
		<thead>
				<th width="20%">Docoument Title</th>
				<th width="12%">Control Code</th>
				<th>Copy #</th>
				<th>Copy holder</th>
				<th>Received by</th>
				<th>Date</th>
		</thead>
		<tbody>
			<tr>
				<td>
				{!! Form::text('document_title', null, ['class' => 'form-control'] ) !!}
				</td>
				<td>
					{!! Form::text('control_code', null, ['class' => 'form-control'] ) !!}
				</td>
				<td>
					{!! Form::text('copy_no', null, ['class' => 'form-control'] ) !!}
				</td>
				<td>
					{!! Form::text('copy_holder', null, ['class' => 'form-control'] ) !!}
				</td>
				<td>
					{!! Form::text('recieved_by', null, ['class' => 'form-control'] ) !!}
				</td>
				<td>
					{!! Form::input('date', 'date_list', Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control'] ) !!}
				</td>
			</tr>
		</tbody>

</table>


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


<div class="form-group{{ $errors->has('user_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('user_list', 'Approver:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('user_list', $users, null, ['class' => 'form-control', 'placeholder' => '--- Select Approver ---'] ) !!}
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