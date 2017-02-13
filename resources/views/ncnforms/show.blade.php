@extends('layouts.admin-layout')
@section('content')

       <a href="{{asset('http://172.17.2.88/qmdforms/storage/app/'.$ncnform->attach_file)}}" class="btn btn-primary" download>  
                                Download Attachement
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
			Doc No. <strong>LFQM-F-019</strong>
			</td>
			<td>
			Rev No. <strong>02</strong>
			</td>
			<td>
			Effective Date
			</td>
			<td>
			June 22, 2016
			</td>
		</tr>
		<tr>
			NON CONFORMANCE NOTIFICATION
			</td>
		</tr>
</table>

<!-- step 1 -->
<table class="table table-bordered">
<tr>
	<td>
		<strong>
		COMPANY:
		</strong>
	</td>
	<td colspan="2">

	</td>
</tr>

<tr>
	<td>
		<strong>
		DIVISION / DEPARTMENT:
		</strong>
	</td>
	<td colspan="2">

	</td>
</tr>

<tr>
	<td colspan="3">
		<strong>
		TYPE OF NON CONFORMITY:
		</strong>
	</td>
</tr>

<tr>
	<td>Customer returns</td>
	<td>Process-related</td>
	<td>Contracted Service</td>
</tr>

<tr>
	<td>Objectives not met</td>
	<td>Vendor</td>
	<td>Others:</td>
</tr>
</table>

<table class="table table-bordered">
<tr>
	<td>Notification NO:.</td>
	<td></td>
	<td>Issued by:</td>
	<td></td>
</tr>
<tr>
	<td>Recurrence No:.</td>
	<td></td>
	<td>Position:</td>
	<td></td>
</tr>
<tr>
	<td>Date of Issuance:</td>
	<td></td>
	<td>Notified Person:</td>
	<td></td>
</tr>
</table>

<table class="table table-bordered">
		<tr>
				<td colspan="4">
			<strong>
				Step 1: Provide details of non-conformity:
			</strong>
			</td>	
		</tr>
		<tr>
				<td colspan="4">
				</td>
		</tr>

		<tr>
			<td colspan="4">
			<strong>
				Step 2: Immediate Action Taken:
			</strong>
			</td>	
		</tr>
		<tr>
			<td colspan="4">
			</td>
		</tr>

		<tr>
			<td>Responsible:</td>
			<td></td>
			<td>Execution Date:</td>
			<td></td>
		</tr>


</table>



@endsection
