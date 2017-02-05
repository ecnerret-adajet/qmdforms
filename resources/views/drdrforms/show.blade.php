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
			Doc No. <strong>LFQM_F-001</strong>
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
	<td>Proposed / Existing Document Title: </td>
	<td>  {{$drdrform->document_title}} </td>
	<td>Rev. No:</td>
	<td colspan="3"></td>
</tr>

<!-- second set -->
<tr>
	<td colspan="5">Reason for proposal / change / cancellation:</td>
</tr>
<tr>
	<td colspan="6">
		{{$drdrform->reason_request}}
	</td>
</tr>

<!-- third set -->
<tr>
	<td>Requester:</td>
	<td>
			{{$drdrform->name}}
	</td>

	<td>Position:</td>
	<td>
		{{$drdrform->position}} <!-- not is database -->
	</td>

	<td>Date:</td>
	<td>
		{{$drdrform->date_request}}
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
		<td>Reviewed By:</td>
		<td>
		@foreach($drdrform->drdrreviewers as $reviewer)
			{{$reviewer->name}}
		@endforeach
		</td>
		<td>Position:</td>
		<td>
		</td>
		<td>Date:</td>
		<td>
		</td>
	</tr>

	<tr>
		<td>Approved By:</td>
		<td>

		</td>
		<td>Position:</td>
		<td>

		</td>
		<td>Date:</td>
		<td>

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
</em>

<!-- step 4 -->
<em>
<h4 style="margin-bottom: 20px;">
	<strong>Step 4</strong> QM to compare to previous distribution (if any), fill out required data and distribute prior effective date acknowledged by the area document controller, dept. head or supervisor.
</h4>
</em>


<table class="table table-bordered">
	<thead>
		<tr>
			<td>Copy No.</td>
			<td>Copyholder (Department)</td>
			<td>Effective Date:</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
	
			</td>
			<td>
				
			</td>
			<td>

			</td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
		<td></td>
		<td></td>
		<td>Drdr No:</td>
		</tr>		
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td>Document Title </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td>Document Code:</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>


		<tr>
			<td></td>
			<td></td>
			<td>Revision No:</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>

	</tbody>
</table>


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