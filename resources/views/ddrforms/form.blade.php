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


<div class="form-group{{ $errors->has('conduct_traceability') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
Reason of distribution
</label>
</div>

<div class="col-md-2">
Relevant External:  
{{ Form::checkbox('relevant_external', 1) }}
</div>

<div class="col-md-2">
Customer Request:
{{ Form::checkbox('customer_request', 1) }}
</div>

<div class="form-group">
<div class="col-md-12">
For others, please specify:  
{!! Form::text('others', null, ['class' => 'form-control'] ) !!}
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

<!-- sample -->
    <div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Document Title
						</th>
						<th class="text-center">
							Control Code
						</th>
						<th class="text-center">
							Copy #
						</th>
						<th class="text-center">
							Copy holder
						</th>
						<th class="text-center">
							Received by
						</th>
						<th class="text-center">
							Date
						</th>
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						1
						</td>

						<td class="{{ $errors->has('document_title[]') ? ' has-error' : '' }}">
						<input type="text" name='document_title[]'  placeholder='Document title' class="form-control" id='document_title_0' />
						</td>

						<td class="{{ $errors->has('control_code[]') ? ' has-error' : '' }}">
						<input type="text" name='control_code[]' placeholder='Control code' class="form-control" id='control_code_0' />
						</td>

						<td class="{{ $errors->has('copy_no[]') ? ' has-error' : '' }}">
						<input type="text" name='copy_no[]' placeholder='Copy no' class="form-control" id='copy_no_0' />
						</td>

						<td class="{{ $errors->has('copy_holder[]') ? ' has-error' : '' }}">
						<input type="text" name='copy_holder[]' placeholder='Copy holder' class="form-control" id='copy_holder_0'/>
						</td>

						<td class="{{ $errors->has('recieved_by[]') ? ' has-error' : '' }}">
						<input type="text" name='recieved_by[]' placeholder='Recieved by' class="form-control" id='recieved_by_0' />
						</td>

						<td class="{{ $errors->has('date_list[]') ? ' has-error' : '' }}">
						<input type="date" name='date_list[]' class="form-control" id='date_list_0' />
						</td>

					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
		</div>
	</div>
	<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>



<!-- end sample -->

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


@section('ddrform_list')
<script>
	$(document).ready(function(){
  var i=1;
        $("#add_row").click(function(){
        $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='document_title[]' type='text' placeholder='Document title' class='form-control input-md' id='document_title_"+i+"'  /></td><td><input name='control_code[]' type='text' placeholder='Control code' class='form-control input-md' id='control_code_"+i+"'  /></td><td><input name='copy_no[]' type='text' placeholder='Copy no' class='form-control input-md' id='copy_no_"+i+"'  /></td><td><input name='copy_holder[]' type='text' placeholder='Copy holder' class='form-control input-md' id='copy_holder_"+i+"'  /></td><td><input name='recieved_by[]' type='text' placeholder='Recieved by' class='form-control input-md' id='recieved_by_"+i+"'  /></td><td><input name='date_list[]' type='date' class='form-control input-md' id='date_list_"+i+"'  /></td>");
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
         if(i>1){
         $("#addr"+(i-1)).html('');
         i--;
         }
     });

});
</script>
@endsection