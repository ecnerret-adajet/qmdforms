<div class="form-group{{ $errors->has('status_list') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('status_list', 'Approval Status:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::select('status_list', $statuses, null, ['class' => 'form-control', 'placeholder' => '--- Select Type of request ---'] ) !!}
@if ($errors->has('status_list'))
<span class="help-block">
<strong>{{ $errors->first('status_list') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('consider_document') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('consider_document', 'Consider Documents in reviewing:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '3'] ) !!}
@if ($errors->has('remarks'))
<span class="help-block">
<strong>{{ $errors->first('remarks') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('remarks', 'Remarks:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '3'] ) !!}
@if ($errors->has('remarks'))
<span class="help-block">
<strong>{{ $errors->first('remarks') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('date_effective') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('date_effective', 'Effective Date:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::input('date', 'date_effective', $drdrapprover->date_effective->format('Y-m-d'), ['class' => 'form-control', 'rows' => '3'] ) !!}
@if ($errors->has('date_effective'))
<span class="help-block">
<strong>{{ $errors->first('date_effective') }}</strong>
</span>
@endif
</div>
</div>



 <div class="row clearfix">
    <div class="col-md-12 column">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center">
              #
            </th>
            <th class="text-center">
              Copy Number
            </th>
            <th class="text-center">
              Copy holder
            </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>
            1
            </td>

            <td class="{{ $errors->has('copy_no[]') ? ' has-error' : '' }}">
            <input type="text" name='copy_no[]'  placeholder='Document title' class="form-control" id='copy_no_0' />
            </td>

            <td class="{{ $errors->has('copyholder[]') ? ' has-error' : '' }}">
            <input type="text" name='copyholder[]' placeholder='Control code' class="form-control" id='copyholder_0' />
            </td>
          </tr>
                    <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
  <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>




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



@section('drdrcopyholder')
<script>
  $(document).ready(function(){
  var i=1;
        $("#add_row").click(function(){
        $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='copy_no[]' type='text' placeholder='Document title' class='form-control input-md' id='copy_no_"+i+"'  /></td><td><input name='copyholder[]' type='text' placeholder='Control code' class='form-control input-md' id='copyholder_"+i+"'  />");
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