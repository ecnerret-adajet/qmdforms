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
			<td rowspan="3" width="60px;">
				<img class="logo-logo" src="{{asset('image/lfug-logo.png')}}" 
				style="display:block;  width: 60px; height: auto; padding: 0;">
			</td>
			<td colspan="5" >La Filipina Uy Gongco Group of Companies</td>
		</tr>
		<tr>
			<td> 
			Doc No. <strong>LFQM-F-001</strong>
			</td>
			<td>
			Rev No. <strong>04</strong>
			</td>
			<td>
			Effective Date
			</td>
			<td colspan="2">
			February 27, 2017
			</td>
		</tr>
		<tr>
			<td colspan="5">
			DOCUMENT REVIEW AND DISTRIBUTION REQUEST
			</td>
		</tr>
</table>




<!-- table start -->
<table class="table borderless">
<!-- first set -->
<!-- <tr>
<td colspan="7">
<em>
<span style="margin-bottom: 20px;">
	<strong>Step 1</strong> Request fills out necessary details.
</span>
</em>
</td>
</tr> -->
<tr>
	<td>
	<em>
	<strong>
		@foreach($drdrform->types as $type)
		{{$type->name}}
		@endforeach
	</strong>
	</em>
	</td>
	<td>
	<em>
	<strong>
		Document Title:
	</strong>
	</em>
	</td>
	<td> 
	 {{$drdrform->document_title}} 
	 </td>
	<td>
	<em>
	<strong>
	Rev. No:
	</strong>
	</em>
	</td>
	<td colspan="3">
		{{$drdrform->revision_number}}
	</td>
</tr>

<!-- second set -->
<tr>
	<td colspan="7">
	<em>
	<strong>
	Reason for proposal / change / cancellation:
	</strong>
	</em>
	</td>
</tr>
<tr>
	<td colspan="7">
		{{$drdrform->reason_request}}
	</td>
</tr>

<!-- third set -->
<tr>
	<td><strong>Requested by:</strong></td>
	<td>
		{{$drdrform->name}}
	</td>

	<td><strong>Position:</strong></td>
	<td>
		{{$drdrform->position}} <!-- not is database -->
	</td>

	<td><strong>Date:</strong></td>
	<td colspan="2">
	{{ date('F d, Y', strtotime($drdrform->date_request)) }}
	</td>

</tr>
</table>
<!-- table end -->

<table class="table borderless" width="100%">
<!-- <tr>
<td colspan="6">
<em>
<span style="margin-bottom: 20px;">
	<strong>Step 2</strong> Requester obtains approval from reviewer and approver. If requester is also the reviewer or approver, disregard this step and proceed to step 3. 
</span>
</em>
</td>
</tr> -->

	<tr>
		<td width="15%">
		<strong>
		Reviewed by:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrreviewers->take(1) as $reviewer)
			{{$reviewer->name}}
		@endforeach
		</td>
		<td width="10%">
		<strong>
		Position:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrreviewers->take(1) as $reviewer)
			{{$reviewer->position}}
		@endforeach
		</td>
		<td width="10%">
		<strong>
		Date:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrreviewers->take(1) as $reviewer)
			{{ date('F d, Y', strtotime($reviewer->date_review)) }}
		@endforeach
		</td>
	</tr>

	<tr>
		<td>
		<strong>
		Approved by:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrapprovers->take(1) as $approver)
			{{$approver->name}}
		@endforeach
		</td>
		<td>
		<strong>
		Position:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrapprovers->take(1) as $approver)
			{{$approver->position}}
		@endforeach
		</td>
		<td>
		<strong>
		Date:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrapprovers->take(1) as $approver)
			{{ date('F d, Y', strtotime($approver->date_approved)) }}
		@endforeach
		</td>
	</tr>	

</table>

<table class="table" width="100%">
	<tr>
		<td class="info">
		<strong>
		Considered Documents in reviewing:
		</strong>
		</td>
	</tr>
	<tr>
	<td style="height: 50px;">
		@foreach($drdrform->drdrreviewers->take(1) as $reviewer)
		{{$reviewer->consider_document}}
		@endforeach
	</td>
	</tr>
</table>







<table class="table table-bordered">
<!-- <tr>
<td class="info" colspan="3">

<em>
<span style="margin-bottom: 10px;">
	<strong>Step 3</strong> Approver defines copyholder and effective date. Requester submits this form to QM with the final draft  (*required attachment: draft of new/ revised document with highlights on changes made).
</span>
</em>
</td>
</tr>

<tr>
	<td class="info" colspan="3">
<em>
<span style="margin-bottom: 10px;">
	<strong>Step 4</strong> QM to compare to previous distribution (if any), fill out required data and distribute prior effective date acknowledged by the area document controller, dept. head or supervisor.
</span>
</em>
	</td>
</tr> -->

	<thead>
		<tr>
			<td class="info">Copy No.</td>
			<td class="info">Copyholder (Department)</td>
			<td rowspan="{{   $row =  (  $approver->drdrcopyholders->count() == 0 ? 0 :  $approver->drdrcopyholders->count() + 1  )  }}"> 
			<strong>Effective date: </strong> 
			@foreach($drdrform->drdrapprovers->take(1) as $approver)
			{{ date('Y-m-d', strtotime($approver->date_effective)) }}
			@endforeach	
			<br/>
			<strong style="margin-top: 10px;">DRDR NO:</strong>
			@foreach($drdrform->drdrmrs as $drdrmr)
			{{$drdrmr->drdr_no}}
			@endforeach
			<br/>
			<strong style="margin-top: 10px;">Document Title:</strong>
			@foreach($drdrform->drdrmrs as $drdrmr)
			{{$drdrmr->document_title}}
			@endforeach
			<br/>
			<strong style="margin-top: 10px;">Document Code:</strong>
			@foreach($drdrform->drdrmrs as $drdrmr)
			{{$drdrmr->document_code}}
			@endforeach
			<br/>
			<strong style="margin-top: 10px;">Revision No:</strong>
			@foreach($drdrform->drdrmrs as $drdrmr)
			{{$drdrmr->revision_number}}
			@endforeach
			</td>
		</tr>
	</thead>
	<tbody>

		@foreach($drdrform->drdrapprovers as $approver)
		@foreach($approver->drdrcopyholders as $copyholder)
		<tr>
			<td>
				{{ $copyholder->copy_no }}
			</td>
			<td>
				{{ $copyholder->copyholder }}
			</td>		
		</tr>
		@endforeach
	@endforeach

	@if(count($approver->drdrcopyholders) == 2)
		<tr>
			<td></td>
			<td></td>
		</tr>
	@elseif(count($approver->drdrcopyholders) == 1)
		<tr>
			<td></td>
			<td></td> 
		</tr>
			<tr>
			<td></td>
			<td></td>
		</tr>
	@else

	@endif

	</tbody>
</table>

<!-- step 5 -->
<!-- <em>
<p style="margin-bottom: 20px;">
	<strong>Step 5</strong> (if applicable) QM marks disposition on obsolete copies.
</p>
</em> -->

<!-- <p>
Yellow stamp with "Obsolete" and use as reference
</p> -->

<table>
	
<table class="table" style="border: 0 ! important;">


	<tr>
		<td width="80px" style="border: 0 ! important;">Verified by:</td>
		<td colspan="3" style="border: 0 ! important;">
		@foreach($drdrform->drdrmrs as $drdrmr)
			{{$drdrmr->verified_by}}
		@endforeach
		</td>
	</tr>


	<tr>
		<td width="80px" style="border: 0 ! important;">Position:</td>
		<td style="border: 0 ! important;">
		@foreach($drdrform->drdrmrs as $drdrmr)
			{{$drdrmr->position}}
		@endforeach
		</td>
		<td width="80px" style="border: 0 ! important;">Date:</td>
		<td style="border: 0 ! important;">
		@foreach($drdrform->drdrmrs as $drdrmr)
			{{ date('F d, Y', strtotime($drdrmr->verified_date)) }}
			@endforeach
		</td>
	</tr>



</table>








</body>
</html>