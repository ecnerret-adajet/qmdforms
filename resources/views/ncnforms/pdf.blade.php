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
			<td colspan="4">
			NON CONFORMANCE NOTIFICATION
			</td>
		</tr>
</table>


<table class="table">
	<tr>
	<td width="30%" class="info">
		<strong>
		COMPANY:
		</strong>
	</td>
	<td colspan="2">
			@foreach($ncnform->companies as $company)
				{{$company->name}}
			@endforeach
	</td>
</tr>

<tr>
	<td class="info">
		<strong>
		DIVISION / DEPARTMENT:
		</strong>
	</td>
	<td colspan="2">
			@foreach($ncnform->departments as $department)
				{{$department->name}}
			@endforeach
	</td>
</tr>
</table>




<!-- step 1 -->
<table class="table borderless">


<tr>
	<td colspan="3">
		<strong>
		TYPE OF NON CONFORMITY:
		</strong>
	</td>
</tr>

<tr>
	<td>	
			
			@if($ncnform->customer_returns == 1)
			<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
			<strong>
			Customer returns
			</strong>


	</td>
	<td>
			@if($ncnform->process_related == 1)
			<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
			<strong>
			 Process-related
			 </strong>

	</td>
	<td>
			@if($ncnform->contracted_services == 1)
				<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
			<strong>
			Contracted Service
			</strong>

	</td>
</tr>

<tr>
	<td>
			@if($ncnform->objective_not_met == 1)
				<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
			<strong>
			Objectives not met
			</strong>
	</td>


	<td>
			@if($ncnform->vendor == 1)
				<img src="{{asset('image/checked.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@else
				<img src="{{asset('image/uncheck.png')}}" style="width: auto; height: 20px; margin-left: 8px;">
			@endif
			<strong>
			Vendor
			</strong>
	</td>
	<td>
	<strong>
	Others:
	</strong>
	{{ $ncnform->others }}
	
	</td>
</tr>
</table>

<table class="table table-bordered">
<tr>
	<td  class="info">
		<strong>
	Notification No:
	</strong>
	</td>
	<td>		
	{{$ncnform->notif_number}}
	</td>
	<td  class="info">
	<strong>
	Issued by:
	</strong>
	</td>
	<td>
	{{$ncnform->name}}		
	</td>
</tr>
<tr>
	<td  class="info">
	<strong>
	Recurrence No:
	</strong>
	</td>
	<td>
	{{$ncnform->recurrence_no}}
	</td>
	<td  class="info">
	<strong>
	Position:
	</strong>
	</td>
	<td>
	{{$ncnform->position}}
	</td>
</tr>
<tr>
	<td  class="info">
	<strong>
	Date of Issuance:
	</strong>
	</td>
	<td>
	{{ date('F d, Y', strtotime($ncnform->date_issuance)) }}			
	</td>
	<td  class="info">
	<strong>
	Notified Person:
	</strong>
	</td>
	<td>
		{{ $ncnform->user->name }}
	</td>
</tr>
</table>

<table class="table table-bordered">
		<tr>
				<td colspan="4" class="info">
			<strong>
				Step 1: Provide details of non-conformity:
			</strong>
			</td>	
		</tr>
		<tr>
				<td colspan="4" style="height:100px; ">
						{{ $ncnform->details_non_conformity }}
				</td>
		</tr>

		<tr>
			<td colspan="4" class="info">
			<strong>
				Step 2: Immediate Action Taken:
			</strong>
			</td>	
		</tr>
		<tr>
			<td colspan="4" style="height:100px; ">
				@foreach($ncnform->ncnnotifieds as $notified)
					{{$notified->action_taken}}
				@endforeach
			</td>
		</tr>

		<tr>
			<td class="info">
			<strong>
			Responsible:
			</strong>
			</td>
			<td>
				@foreach($ncnform->ncnnotifieds as $notified)
					{{$notified->responsible}}
				@endforeach
			</td>
			<td class="info">
			<strong>
			Execution Date:
			</strong>
			</td>
			<td>
				@foreach($ncnform->ncnnotifieds as $notified)
				{{ date('F d, Y', strtotime($notified->execution_date)) }}		
				@endforeach	
			</td>
		</tr>
</table>








</body>
</html>