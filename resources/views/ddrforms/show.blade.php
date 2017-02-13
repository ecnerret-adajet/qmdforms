@extends('layouts.admin-layout')
@section('content')

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
			CUSTOMER COMPLAINT REPORT
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
		<td>Relevant external doc. (controll copy)</td>
	</tr>
	<tr>
		<td>Customer request (uncontrolled copy)</td>
	</tr>
	<tr>
		<td>Others,</td>
	</tr>
	<tr>
		<td>
		<strong>
		Date Neeeded:
		</strong> 
		</td>
		<td>
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

<strong>
	Total number of obsolete copy retrieved: 
</strong>

<table class="table table-bordered">
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
		<td></td>
	</tr>
	<tr>
		<td>Date</td>
		<td></td>
		<td>Date</td>
		<td></td>
		<td>Date</td>
		<td></td>
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
