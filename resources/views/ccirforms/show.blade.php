
@extends('layouts.admin-layout')
@section('content')

@role((['Administrator','Notified','Moderator']))
  <a href="{{  str_replace('public/','storage/app/',asset($ccirform->attach_file)) }}" class="btn btn-primary" download> 
        Download Attachement 
  </a>

   <a href="{{url('ccirforms/pdf/'.$ccirform->id)}}" target="_blank" class="btn btn-primary">  
       Print as PDF
  </a> 
@endrole

<hr/>


<table class="table table-bordered">
		<tr>
			<td rowspan="3" width="10%">
				<img class="img-responsive" src="{{asset('image/lfug-logo.png')}}" style="padding: 10px; width: 100px; height: auto;">
			</td>
			<td colspan="4">La Filipina Uy Gongco Group of Companies</td>
		</tr>
		<tr>
			<td> 
			Doc No. <strong>LFQM-F-029b</strong>
			</td>
			<td>
			Rev No. <strong>00</strong>
			</td>
			<td>
			Effective Date
			</td>
			<td>
			
			</td>
		</tr>
		<tr>
			<td colspan="5">
			CUSTOMER COMPLAINT REPORT
			</td>
		</tr>
</table>



<!-- step 2 -->
<table class="table table-bordered">
	<tr>
		<td colspan="7">
			<h4>
				<strong>
					Step: 1
				</strong>
			</h4>
		</td>
	</tr>

	<tr>
		<td>Issuer:</td>
		<td colspan="6">
		{{$ccirform->company}}
		</td>
	</tr>

	<tr>
		<td>Date of Issuance:</td>
		<td colspan="6">
		{{ date('F d Y', strtotime($ccirform->date_issuance)) }}
		</td>
	</tr>

	<tr>
		<td>Brand Name:</td>
		<td colspan="6">
			{{$ccirform->brand_name}}
		</td>
	</tr>

	<tr>
		<td>Affected Quantities</td>
		<td colspan="6">
			{{$ccirform->affected_quantities}}
		</td>
	</tr>

	<tr>
		<td>Product Control No</td>
		<td colspan="2">
			{{$ccirform->product_no}}
		</td>
		<td>Delivery Date</td>
		<td colspan="3">
			{{ date('F d Y', strtotime($ccirform->date_delivery)) }}
		</td>
	</tr>

	<tr>
		<td>Quantity of sample</td>
		<td colspan="2">
			{{$ccirform->quantity_received}}
		</td>
		<td>Return Date</td>
		<td colspan="3">
			{{ date('F d Y', strtotime($ccirform->return_date)) }}
		</td>
	</tr>

	<tr>
		<td rowspan="3">Nature of Complaint</td>
		<td>Wet/Lumpy</td>
		<td>
			@if($ccirform->wet_lumpy == 1)
				<i class="ion-checkmark-round" style="color: green;"></i>
			@endif
		</td>
		<td>Busted Bag</td>
		<td>
			@if($ccirform->busted_bag == 1)
				<i class="ion-checkmark-round" style="color: green;"></i>
			@endif
		</td>
		<td>Under / Over Weight</td>
		<td>
			@if($ccirform->under_over_weight == 1)
				<i class="ion-checkmark-round" style="color: green;"></i>
			@endif
		</td>
	</tr>

	<tr>
		<td>Infested</td>
		<td>
			@if($ccirform->infested == 1)
				<i class="ion-checkmark-round" style="color: green;"></i>
			@endif
		</td>
		<td>Dirty Packaging</td>
		<td>
			@if($ccirform->dirty_package == 1)
				<i class="ion-checkmark-round" style="color: green;"></i>
			@endif
		</td>
		<td>Others</td>
		<td>
			@if(!empty($ccirform->others))
			<i class="ion-checkmark-round" style="color: green;"></i>
			@endif
		</td>
	</tr>

	<tr>
		<td>For Other please specify:</td>
		<td colspan="5">
						{{$ccirform->others}}
		</td>
	</tr>

	<tr>
		<td>
		Other Details:<br/>
		</td>
		<td colspan="6">
			{{$ccirform->other_details}}
		</td>
	</tr>
</table>



<table class="table table-bordered">
	<tr>
		<td width="50%">Prepared By:</td>
		<td>	{{$ccirform->name}} </td>
	</tr>
</table>


@endsection
