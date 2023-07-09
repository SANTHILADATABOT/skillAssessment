@extends('templates.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        	<div class="row">
	            <div class="col-lg-12 margin-tb">

	                <div class="pull-right mb-2">
        	            <a class="btn btn-success" href="{{ route('employees.create') }}"> Create Employee</a>
                	</div>
	            </div>
        	</div>
	        @if ($message = Session::get('success'))
        	    <div class="alert alert-success">
                	<p>{{ $message }}</p>
	            </div>
        	@endif
	        <table class="table table-bordered">
        		<thead>
                		<tr>
                    			<th>S.No</th>
			                <th>Company Name</th>
					<th>Employee Name</th>
        	            		<th>Email</th>
					<th>Mobile</th>
			                <th>Address</th>
					<th>Logo</th>
                    			<th width="280px">Action</th>
	                	</tr>
        	    	</thead>
		       	<tbody>
                @foreach ($employees as $employee)
                    		<tr>
					<td>{{ $employee->id}} </td>
                        		<td>{{ $employee->name}}</td>
                        		<td>{{ $employee->employee_name }}</td>
                        		<td>{{ $employee->employee_email }}</td>
					<td>{{ $employee->employee_mobile}}</td>
                        		<td>{{ $employee->address }}</td>
					<td> <img src="{{ asset($employee->employee_photo_path) }}" alt="{{$employee->employee_name}}" title="{{$employee->employee_name}}" width="20%" height="20%"></td>
                        		<td>
                            			<form action="{{ route('employees.destroy',$employee->id) }}" method="Post">
                                			<a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                                			@csrf
                                			@method('DELETE')
                                			<button type="submit" class="btn btn-danger">Delete</button>
                            			</form>
                        		</td>
                    		</tr>
                @endforeach
            		</tbody>
        	</table>
    	</div>
	</div>
</div>
@endsection
