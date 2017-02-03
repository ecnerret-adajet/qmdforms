<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('name', 'Issuer:') !!}
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

<hr/>
<h4><strong>A. Initial Assesment</strong></h4>
<hr/>

<div class="form-group{{ $errors->has('customer_reference') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('customer_reference', 'Customer Complaint Reference No:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('customer_reference', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('customer_reference'))
<span class="help-block">
<strong>{{ $errors->first('customer_reference') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('brand_name', 'Brand Name:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('brand_name', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('brand_name'))
<span class="help-block">
<strong>{{ $errors->first('brand_name') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('affected_quantities') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('affected_quantities', 'Affected Quantities:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('affected_quantities', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('affected_quantities'))
<span class="help-block">
<strong>{{ $errors->first('affected_quantities') }}</strong>
</span>
@endif
</div>
</div>



<div class="form-group{{ $errors->has('product_no') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('product_no', 'Product Control No:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('product_no', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('product_no'))
<span class="help-block">
<strong>{{ $errors->first('product_no') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group{{ $errors->has('date_delivery') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('date_delivery', 'Delivery Date:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::input('date', 'date_delivery', $ccirform->date_delivery->format('Y-m-d'), ['class' => 'form-control'] ) !!}
@if ($errors->has('date_delivery'))
<span class="help-block">
<strong>{{ $errors->first('date_delivery') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('quantity_received') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('quantity_received', 'Quantity of sample received:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::text('quantity_received', null, ['class' => 'form-control'] ) !!}
@if ($errors->has('quantity_received'))
<span class="help-block">
<strong>{{ $errors->first('quantity_received') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('return_date') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
{!! Form::label('return_date', 'Return Date:') !!}
</label>
</div>

<div class="col-md-12">
{!! Form::input('date', 'return_date', $ccirform->return_date->format('Y-m-d'), ['class' => 'form-control'] ) !!}
@if ($errors->has('return_date'))
<span class="help-block">
<strong>{{ $errors->first('return_date') }}</strong>
</span>
@endif
</div>
</div>





<div class="form-group{{ $errors->has('conduct_traceability') ? ' has-error' : '' }}">
<div class="col-md-12 ">
<label class="control-label">
Nature of complaint:
</label>
</div>

<div class="col-md-2">
Wet/Lumpy:  
{{ Form::checkbox('wet_lumpy', 1) }}
</div>

<div class="col-md-2">
Busted Bag:
{{ Form::checkbox('busted_bag', 1) }}
</div>

<div class="col-md-2">
Under/Over Weight:
{{ Form::checkbox('under_over_weight', 1) }}
</div>

<div class="col-md-2">
Infested:
{{ Form::checkbox('infested', 1) }}
</div>

<div class="col-md-2">
Dirty Packaging: 
{{ Form::checkbox('dirty_package', 1) }}
</div>
</div>

<div class="form-group{{ $errors->has('conduct_traceability') ? ' has-error' : '' }}">
<div class="col-md-12">
For others, please specify:  
{!! Form::text('others', null, ['class' => 'form-control'] ) !!}
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