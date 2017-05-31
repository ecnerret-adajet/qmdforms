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
{!! Form::text('name', $drdrform->name, ['class' => 'form-control', 'disabled'] ) !!}
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('reviewer_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('reviewer_list', 'Reviewer:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('reviewer_list', $reviewer_list, $reviewer_name, ['class' => 'form-control', 'placeholder' => '--- Select Reviewer ---'] ) !!}
@if ($errors->has('reviewer_list'))
<span class="help-block">
<strong>{{ $errors->first('reviewer_list') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('approver_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('approver_list', 'Approver:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('approver_list', $approver_list, $approver_name, ['class' => 'form-control', 'placeholder' => '--- Select Reviewer ---'] ) !!}
@if ($errors->has('approver_list'))
<span class="help-block">
<strong>{{ $errors->first('approver_list') }}</strong>
</span>
@endif
</div>
</div>



<hr/>

<!-- updates approver date_effective -->
@if(!empty($approver))
<div class="form-group{{ $errors->has('date_effective') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('date_effective', 'Effective Date:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::input('date', 'date_effective', $approver->date_effective->format('Y-m-d'), ['class' => 'form-control'] ) !!}
@if ($errors->has('date_effective'))
<span class="help-block">
<strong>{{ $errors->first('date_effective') }}</strong>
</span>
@endif
</div>
</div>

@else

<div class="form-group{{ $errors->has('date_effective') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
Effective Date
</label>
</div>

<div class="col-md-12">
NO EFFECTIVE DATE YET
</div>
</div>


@endif


@if(!empty($drdrmr))

<div class="form-group{{ $errors->has('verified_date') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('verified_date', 'Verified Date:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::input('date', 'verified_date', $drdrmr->verified_date->format('Y-m-d'), ['class' => 'form-control', 'rows' => '3'] ) !!}
@if ($errors->has('verified_date'))
<span class="help-block">
<strong>{{ $errors->first('verified_date') }}</strong>
</span>
@endif
</div>
</div>

@else

<div class="form-group{{ $errors->has('verified_date') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
Verified Date
</label>
</div>

<div class="col-md-12">
NO VERIFIED DATE YET
</div>
</div>

@endif

<hr/>




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