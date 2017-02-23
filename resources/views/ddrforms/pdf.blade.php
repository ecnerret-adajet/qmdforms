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

	.borderless, .borderless th, .borderless td {
		border: 0 ! important;
		font-size: 12px;
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
			DOCUMENT DISTRIBUTION REQUEST
			</td>
		</tr>
</table>



<!-- step 1 -->
<!-- <em>
<h5>
	<strong>Step 1:</strong>
	Requester defines reason for distribution and required date of distribution.
</h5>
</em>
 -->
<table class="table borderless">
	<tr>
		<td rowspan="3">
		<strong>
			Reason for distribution:
		</strong>
		</td>

		<td colspan="2">

			@if($ddrform->relevant_external == 1)
				<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif

			Relevant external doc. (controll copy)

		
		</td>
	</tr>

	<tr>
		<td colspan="3">
			@if($ddrform->customer_request == 1)
			<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif

			Customer request (uncontrolled copy)
		
		</td>
	</tr>
	<tr>
		<td>
		@if(!empty($ddrform->others))
			<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
		<strong>
		Others:
		</strong>

		</td>
		<td colspan="2">
		{{$ddrform->others}} 	
		</td>
	</tr>
	<tr>
		<td>
		<strong>
		Date Neeeded:
		</strong> 
		</td>
		<td colspan="3">
		{{ date('F d, Y', strtotime($ddrform->date_needed)) }}
		</td>
	</tr>
</table>


<table class="table table-bordered">
	<thead>
<!-- 		<tr>
		<td class="info" colspan="7">
		<em>
		<h5>
			<strong>Step 2:</strong>
	Requester fills out columns with asterisk, obtains approval from department head and 
	submits to DC (Together with orignal and photocopoies of the external document).
		</h5>
		</em>
		</td>
		</tr> -->
<!-- 		<tr>
		<td class="info" colspan="7">
		<em>
		<h5>
	<strong>Step 3:</strong>
	DC distributes base on defined copyholder and signs below.
		</h5>
		</em>
		</td>
		</tr> -->
		<tr>
			<th  class="info">Document Title</th>
			<th  class="info">Control Code</th>
			<th  class="info">Rev No.</th>
			<th  class="info">Copy No.</th>
			<th  class="info">Copy holder</th>
			<th  class="info">Received by:</th>
			<th  class="info">Date</th>
		</tr>
	</thead>
	<tbody>
	@foreach($ddrform->ddrlists as $ddrlist)
		<tr>
			<td>
				{{$ddrlist->document_title}}
			</td>
			<td>
				{{$ddrlist->control_code}}
			</td>
			<td>
				{{$ddrlist->rev_no}}
			</td>
			<td>
				{{$ddrlist->control_code}}
			</td>
			<td>
				{{$ddrlist->copy_holder}}
			</td>
			<td>
				{{$ddrlist->recieved_by}}
			</td>
			<td>
					{{ date('F d, Y', strtotime($ddrlist->date_list)) }}
			</td>
		</tr>
	@endforeach
	</tbody>
</table>



<table class="table table-bordered">
	<tr>
	<td class="info" colspan="6">
	<em>
<strong>
	Total number of obsolete copy retrieved: 
</strong>
	</em>
	</td>
	</tr>
	<tr>
		<td>
		<strong>
		Requested by: 
		<strong>
		</td>
		<td> {{$ddrform->name}} </td>
		<td>
		<strong>
		Approved by:
		</strong>
		</td>
		<td>
			@foreach($ddrform->ddrapprovers as $approver)
				{{$approver->name}}
			@endforeach
		</td>
		<td>
		<strong>
		Distbuted by:
		</strong>
		</td>
		<td>
		@foreach($ddrform->ddrmrs as $mr)
				{{$mr->name}}
			@endforeach
		</td>
	</tr>
	<tr>
		<td>
		<strong>
		Date
		</strong>
		</td>
		<td>{{ date('F d, Y', strtotime($ddrform->date_requested)) }}</td>
		<td>
		<strong>
		Date
		</strong>
		</td>
		<td>
		@foreach($ddrform->ddrapprovers as $approver)
			{{ date('F d, Y', strtotime($approver->date_approved)) }}
			@endforeach
		</td>
		<td>
		<strong>
		Date
		</strong>
		</td>
		<td>
			@foreach($ddrform->ddrmrs as $mr)
			{{ date('F d, Y', strtotime($mr->verified_date)) }}
			@endforeach
		</td>
	</tr>
</table>

<p>
	<small>
		Disclaimer for uncrolled document:
	</small>
</p>

<p>
	<small>
			<ul>
		<li>Documents are issued as requested and shall not be used for any other purpose</li>
		<li>
		No Part of the document may be reproduced or utilized in any form, electronic or mechanical, including photocopying without written permission to the QM Document Controller.
		</li>
	</ul>
	</small>

</p>



</body>
</html>