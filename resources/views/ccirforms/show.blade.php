@extends('layouts.admin-layout')
@section('content')

<p>
	 <a href="#" class="btn btn-primary" download>  
         <i class="ion-ios-cloud-download-outline"></i>  Download Attachement
     </a>  
</p>


<table class="table table-bordered">
		<tr>
			<td rowspan="3" width="10%">
				<img class="img-responsive" src="{{asset('image/lfug-logo.png')}}" style="padding: 10px; width: 100px; height: auto;">
			</td>
			<td colspan="4">La Filipina Uy Gongco Group of Companies</td>
		</tr>
		<tr>
			<td>
			Doc No. <strong>MTS-F-008</strong>
			</td>
			<td>
			Rev No. <strong>04</strong>
			</td>
			<td>
			Effective Date
			</td>
			<td>
			XXXXXX
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
		{{$ccirform->name}}
		</td>
	</tr>

	<tr>
		<td>Date of Issuance:</td>
		<td colspan="6">
		{{ date('F m Y', strtotime($ccirform->date_issuance)) }}
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
			{{ date('F m Y', strtotime($ccirform->date_delivery)) }}
		</td>
	</tr>

	<tr>
		<td>Quantity of sample recieved?</td>
		<td colspan="2"></td>
		<td>Return Date</td>
		<td colspan="3"></td>
	</tr>

	<tr>
		<td rowspan="3">Naturn of Compalaint</td>
		<td>Wet/Lumpy</td>
		<td></td>
		<td>Busted Bag</td>
		<td></td>
		<td>Under / Over Weight</td>
		<td></td>
	</tr>

	<tr>
		<td>Infested</td>
		<td></td>
		<td>Dirty Packaging</td>
		<td></td>
		<td>Others</td>
		<td></td>
	</tr>

	<tr>
		<td>For Other please specify:</td>
		<td colspan="5"></td>
	</tr>

	<tr>
		<td>
		Other Details:<br/>
		(Attach extra sheet if necessary)
		</td>
		<td colspan="6">

		</td>
	</tr>
</table>



<table class="table table-bordered">
	<tr>
		<td width="50%">Prepared By:</td>
		<td></td>
	</tr>

	<tr>
		<td width="50%">Approved by:</td>
		<td></td>
	</tr>
</table>


@endsection
