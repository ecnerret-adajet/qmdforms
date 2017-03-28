@extends('layouts.admin-layout')
@section('content')

    <a href="{{  str_replace('public/','storage/app/',asset($ncnform->attach_file)) }}" class="btn btn-primary" download> 
        Download Attachement 
  </a>

@role((['Administrator','Notified','Moderator']))
   <a href="{{url('ncnforms/pdf/'.$ncnform->id)}}" target="_blank" class="btn btn-primary">  
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
			@foreach($ncnform->companies as $company)
				{{$company->name}}
			@endforeach
	</td>
</tr>

<tr>
	<td>
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

<tr>
	<td colspan="3">
		<strong>
		TYPE OF NON CONFORMITY:
		</strong>
	</td>
</tr>


@foreach($nonconformities->chunk(3) as $noncormity)
<tr>
	@foreach($noncormity as $item)	
	<td>
		@foreach($ncnform->nonconformities as $x)
				@if($x->name == $item->name)
				<i class="ion-android-checkbox-outline" style="font-weight: bold; font-size: 20px;"></i>  {{$item->name}}
				@elseif($item->name == 'Others')
					@if(!empty($ncnform->others))
				<i class="ion-android-checkbox-outline" style="font-weight: bold; font-size: 20px;"></i>  
				Others:  {{ $ncnform->others }}
					@else
					<i class="ion-android-checkbox-outline-blank" style="font-weight: bold; font-size: 20px;"></i> Others:
					@endif		
				@else
				<i class="ion-android-checkbox-outline-blank" style="font-weight: bold; font-size: 20px;"></i>  {{$item->name}} 
				@endif
		@endforeach	
		</td>
	@endforeach	
</tr>
@endforeach











</table>

<table class="table table-bordered">
<tr>
	<td>Notification No:</td>
	<td>
		<strong>
			{{$ncnform->notif_number}}
		</strong>
	</td>
	<td>Issued by:</td>
	<td>
		<strong>
			{{$ncnform->name}}
		</strong>
	</td>
</tr>
<tr>
	<td>Recurrence No:</td>
	<td>
		<strong>
			{{$ncnform->recurrence_no}}
		</strong>
	</td>
	<td>Position:</td>
	<td>
		<strong>
			{{$ncnform->position}}
		</strong>
	</td>
</tr>
<tr>
	<td>Date of Issuance:</td>
	<td>
		<strong>
			{{ date('F d, Y', strtotime($ncnform->date_issuance)) }}			
		</strong>
	</td>
	<td>Notified Person:</td>
	<td>
		<strong>
		{{ $ncnform->user->name }}
		</strong>
	</td>
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
						{{ $ncnform->details_non_conformity }}
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
				@foreach($ncnform->ncnnotifieds as $notified)
					{{$notified->action_taken}}
				@endforeach
			</td>
		</tr>

		<tr>
			<td>Responsible:</td>
			<td>
		@foreach($ncnform->ncnnotifieds->take(1) as $ncnnotified)
				{{ $ncnnotified->name }}
		@endforeach
			</td>
			<td>Execution Date:</td>
			<td>
				@foreach($ncnform->ncnnotifieds->take(1) as $notified)
				{{ date('F d, Y', strtotime($notified->execution_date)) }}		
				@endforeach	
			</td>
		</tr>


</table>



@endsection
