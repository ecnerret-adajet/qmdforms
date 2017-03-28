@extends('layouts.admin-layout')
@section('content')



@role((['Administrator','Notified','Moderator']))
   <a href="{{url('ddrforms/pdf/'.$ddrform->id)}}" target="_blank" class="btn btn-primary">  
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
			Doc No. <strong>LFQM-F-002</strong>
			</td>
			<td>
			Rev No. <strong>03</strong>
			</td>
			<td>
			Effective Date
			</td>
			<td>
			
			</td>
		</tr>
		<tr>
			<td colspan="5">
			DOCUMENT DISTRIBUTION REQUEST
			</td>
		</tr>
</table>


<!-- step 1 -->
<em>
<h4>
	<strong>Step 1:</strong>
	Requester defines reason for distribution and required date of distribution.
</h4>
</em>

<table class="table table-bordered">
	<tr>
		<td rowspan="4">
			Reason for distribution:
		</td>
	</tr>
	<tr>
		<td colspan="2">

			@if($ddrform->relevant_external == 1)
				<i class="ion-android-checkbox-outline" style="font-weight: bold; font-size: 20px;"></i>  Relevant external doc. (controll copy)
			@else
				<i class="ion-android-checkbox-outline-blank" style="font-weight: bold; font-size: 20px;"></i>  Relevant external doc. (controll copy)
			@endif

		
		</td>
	</tr>
	<tr>
		<td colspan="2">
			@if($ddrform->customer_request == 1)
				<i class="ion-android-checkbox-outline" style="font-weight: bold; font-size: 20px;"></i>  Customer request (uncontrolled copy)
			@else
				<i class="ion-android-checkbox-outline-blank" style="font-weight: bold; font-size: 20px;"></i>  Customer request (uncontrolled copy)
			@endif
		
		</td>
	</tr>
	<tr>
		<td>
		<strong>
		Others:
		</strong>

		</td>
		<td>
{{$ddrform->others}} 	
		</td>
	</tr>
	<tr>
		<td>
		<strong>
		Date Neeeded:
		</strong> 
		</td>
	<td colspan="2">
		{{ date('F d, Y', strtotime($ddrform->date_needed)) }}
		</td>
	</tr>
</table>


<!-- step 2 -->
<em>
<h4>
	<strong>Step 2:</strong>
	Requester fills out columns with asterisk, obtains approval from department head and 
	submits to DC (Together with orignal and photocopoies of the external document).
</h4>
</em>

<!-- step 2 -->
<em>
<h4>
	<strong>Step 3:</strong>
	DC distributes base on defined copyholder and signs below.
</h4>
</em>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Document Title</th>
			<th>Control Code</th>
			<th>Rev No.</th>
			<th>Copy No.</th>
			<th>Copy holder</th>
			<th>Received by:</th>
			<th>Date</th>
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
		Distributed by:
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
		Position: 
		<strong>
		</td>
		<td> {{$ddrform->position}} </td>
		<td>
		<strong>
		Position:
		</strong>
		</td>
		<td>
			@foreach($ddrform->ddrapprovers as $approver)
				{{$approver->position}}
			@endforeach
		</td>
		<td>
		<strong>
		Position:
		</strong>
		</td>
		<td>
		@foreach($ddrform->ddrmrs as $mr)
				{{$mr->position}}
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





@endsection
