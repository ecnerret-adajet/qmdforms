<!DOCTYPE html>
<html>
<head>
	<title>PDF Download</title>


		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">

        <style>
        body {
        font-family: 'Miriam Libre', sans-serif;
        font-size: 70%;
        }

        h1,h2,h3,h4,h5,h6{
            font-family: 'Miriam Libre', sans-serif;
        }

    table, th, td {
	   border: 0.50px solid black ! important;
	}

  
    </style>

</head>
<body>

<table class="table table-bordered">
		<tr>
			<td rowspan="3">
				<img class="logo-logo" src="{{asset('image/lfug-logo.png')}}" 
				style="display:block;  width: 60px; height: auto; padding: 0; margin: 10px 10px 0 30px;">
			</td>
			<td colspan="5" >La Filipina Uy Gongco Group of Companies</td>
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
			<td colspan="2">
			Feb. 25, 2017
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
		<td class="info">
		<strong>
		Issuer:
		</strong>
		</td>
		<td colspan="6">
		{{$ccirform->company}}
		</td>
	</tr>

	<tr>
		<td class="info">
		<strong>
		Date of Issuance:
		</strong>
		</td>
		<td colspan="6">
		{{ date('F m Y', strtotime($ccirform->date_issuance)) }}
		</td>
	</tr>

	<tr>
		<td class="info">
		<strong>
		Brand Name:
		</strong>
		</td>
		<td colspan="6">
			{{$ccirform->brand_name}}
		</td>
	</tr>

	<tr>
		<td class="info">
		<strong>
		Affected Quantities
		</strong>
		</td>
		<td colspan="6">
			{{$ccirform->affected_quantities}}
		</td>
	</tr>

	<tr>
		<td class="info">
		<strong>
		Product Control No
		</strong>
		</td>


		<td colspan="2">
			{{$ccirform->product_no}}
		</td>
		<td class="info">
		<strong>
		Delivery Date
		</strong>
		</td>
		<td colspan="3">
			{{ date('F m Y', strtotime($ccirform->date_delivery)) }}
		</td>
	</tr>

	<tr>
		<td class="info">
		<strong>
		Quantity of sample recieved?
		</strong>
		</td>
		<td colspan="2">
			{{$ccirform->quantity_received}}
		</td>
		<td class="info">
		<strong>
		Return Date
		</strong>
		</td>
		<td colspan="3">
			{{ date('F m Y', strtotime($ccirform->retrun_date)) }}
		</td>
	</tr>

	<tr>
		<td rowspan="3" class="info">
		<strong>
		Naturn of Compalaint:
		</strong>
		</td>
		<td class="info">
		<strong>
		Wet/Lumpy
		</strong>
		</td>
		<td>
			@if($ccirform->wet_lumpy == 1)
				<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
		</td>
		<td class="info">
		<strong>
		Busted Bag
		</strong>
		</td>
		<td>
			@if($ccirform->busted_bag == 1)
					<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
		</td>
		<td class="info">
		<strong>
		Under / Over Weight
		</strong>
		</td>
		<td>
			@if($ccirform->under_over_weight == 1)
						<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
		</td>
	</tr>

	<tr>
		<td class="info">
		<strong>
		Infested
		</strong>
		</td>
		<td>
			@if($ccirform->infested == 1)
			<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
		</td>
		<td class="info">
		<strong>
		Dirty Packaging
		</strong>
		</td>
		<td>
			@if($ccirform->dirty_package == 1)
			<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
		</td>
		<td class="info">
		<strong>
		Others
		</strong>
		</td>

		<td>
			@if(!empty($ccirform->others))
			<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
		</td>
	</tr>

	<tr>
		<td class="info">
		<strong>
		For Other please specify:
		</strong>
		</td>
		<td colspan="5">
			{{$ccirform->others}}
		</td>
	</tr>


</table>



<table class="table table-bordered">
	<tr>
		<td width="23%" class="info">
		<strong>
		Prepared By:
		</strong>
		</td>
		<td>	{{$ccirform->name}} </td>
	</tr>
</table>

</body>
</html>