@extends('layouts.admin-layout')
@section('content')

  <a href="{{asset('http://172.17.2.88/qmdforms/storage/app/'.$drdrform->attach_file)}}" class="btn btn-primary" download>  
                                Download Attachment 
      </a>  

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
			Doc No. <strong>LFQM-F-001</strong>
			</td>
			<td>
			Rev No. <strong>04</strong>
			</td>
			<td>
			Effective Date
			</td>
			<td>
		
			</td>
		</tr>
		<tr>
			<td colspan="5">
			DOCUMENT REVIEW and DISTRIBUTION REQUEST
			</td>
		</tr>
</table>

<!-- step 1 -->
<em>
<h4 style="margin-bottom: 20px;">
	<strong>Step 1</strong> Request fills out necessary details.
</h4>
</em>


<!-- table start -->
<table class="table" width="100%">
<!-- first set -->
<tr>
	<td>
	<strong>
	Proposed / Existing Document Title: 
	</strong>
	</td>
	<td>  {{$drdrform->document_title}} </td>
	<td>
	<strong>
	Rev. No:
	</strong>
	</td>
	<td colspan="3">
		{{$drdrform->revision_number}}
	</td>
</tr>

<!-- second set -->
<tr>
	<td colspan="5">
	<strong>
	Reason for proposal / change / cancellation:
	</strong>
	</td>
</tr>
<tr>
	<td colspan="6">
		{{$drdrform->reason_request}}
	</td>
</tr>

<!-- third set -->
<tr>
	<td><strong>Requester:</strong></td>
	<td>
		{{$drdrform->name}}
	</td>

	<td><strong>Position:</strong></td>
	<td>
		{{$drdrform->position}} <!-- not is database -->
	</td>

	<td><strong>Date:</strong></td>
	<td>
	{{ date('F d, Y', strtotime($drdrform->date_request)) }}
	</td>

</tr>
</table>
<!-- table end -->


<!-- step 2 -->
<em>
<h4 style="margin-bottom: 20px;">
	<strong>Step 2</strong> Requester obtains approval from reviewer and approver. If requester is also the reviewer or approver, disregard this step and proceed to step 3. 
</h4>
</em>


<table class="table" width="100%">
	<tr>
		<td>
		<strong>
		Reviewed By:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrreviewers as $reviewer)
			{{$reviewer->name}}
		@endforeach
		</td>
		<td>
		<strong>
		Position:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrreviewers as $reviewer)
			{{$reviewer->position}}
		@endforeach
		</td>
		<td>
		<strong>
		Date:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrreviewers as $reviewer)
			{{ date('F d, Y', strtotime($reviewer->date_review)) }}
		@endforeach
		</td>
	</tr>

	<tr>
		<td>
		<strong>
		Approved By:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrapprovers as $approver)
			{{$approver->name}}
		@endforeach
		</td>
		<td>
		<strong>
		Position:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrapprovers as $approver)
			{{$approver->position}}
		@endforeach
		</td>
		<td>
		<strong>
		Date:
		</strong>
		</td>
		<td>
		@foreach($drdrform->drdrapprovers as $approver)
			{{$approver->date_approved}}
		@endforeach
		</td>
	</tr>	

</table>

<table class="table" width="100%">
	<tr>
		<td>Considered Docments in reviewing:</td>
	</tr>
	<tr>
	<td></td>
	</tr>
</table>


<!-- step 3 -->
<em>
<h4 style="margin-bottom: 20px;">
	<strong>Step 3</strong> Approver defines copyholder and effective date. Requester submits this form to QM with the final draft  <small> (*required attachment: draft of new/ revised document with highlights on changes made).</small>
</h4>
</em>1

<!-- step 4 -->
<em>
<h4 style="margin-bottom: 20px;">
	<strong>Step 4</strong> QM to compare to previous distribution (if any), fill out required data and distribute prior effective date acknowledged by the area document controller, dept. head or supervisor.
</h4>
</em>


<div class="row">
<div class="col-md-8" style="padding-right: 0 ! important; margin-right: 0 ! important">
<table class="table table-bordered">
	<thead>
		<tr>
			<td>Copy No.</td>
			<td>Copyholder (Department)</td>
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

	</tbody>
</table>
</div><!-- end col-md-8 -->

<div class="col-md-4" style="padding-left: 0 ! important;">
		<table class="table table-bordered" style="border-left: 0 ! important;">
			<thead>
				<tr>
					<td style="border-left: 0 ! important;">
					Effective Date:
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="border-left: 0 ! important;">
				
					</td>
				</tr>
				<tr>
					<td style="border-left: 0 ! important;">
					DRDR NO:
					</td>
				</tr>
				<tr>
					<td style="border-left: 0 ! important;">
					Document Title:
					</td>
				</tr>
				<tr>
					<td style="border-left: 0 ! important;">
					Document Code:
					</td>
				</tr>
				<tr>
					<td style="border-left: 0 ! important;">
					Revision No:
					</td>
				</tr>
			</tbody>
		</table>
</div>
</div>



<!-- step 5 -->
<em>
<h4 style="margin-bottom: 20px;">
	<strong>Step 5</strong> (if applicable) QM marks disposition on obsolete copies.
</h4>
</em>

<p>
Yellow stamp with "Obsolete" and use as reference
</p>

<table>
	
<table width="100%" style="margin-bottom: 100px;">
	<tr>
		<td>Verified by:</td>
		<td></td>
		<td>Date:</td>
		<td></td>
	</tr>
</table>



@endsection