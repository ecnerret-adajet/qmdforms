<table class="table">


    <tr>
    	<th>Document Title</th>
    	<td>{{$drdrform->document_title}}</td>
    </tr>

    <tr>
		<th>Document Title</th>
    	<td>{{$drdrform->document_title}}</td>
</tr>

	<tr>
    	<th>Revision Number</th>
    	<td>{{$drdrform->revision_number}}</td>
    </tr>

    <tr>
    	<th>Company</th>
    	<td>
    	@foreach($drdrform->companies as $company)
    	{{$company->name}}
    	@endforeach
    	</td>
</tr>




    </tr>


</table>