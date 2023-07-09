@extends('templates.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Employee</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('employees.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('employees.update',$employees->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
		<input type="hidden" name="employeeID" id="employeeID" value="{{$employees->id}}"/>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company</strong>
                        <select id="company_id" name="company_id" class="form-control">
  			@foreach ($companies as $data)
				@if($employees->company_id == $data->id)
					<?php $sele = 'selected="SELECTED"';?>
				@else
					<?php $sele	=	'';?>
				@endif
                            <option value="{{$data->id}}" <?php echo $sele;?>>
                                {{$data->name}}
                            </option>
                        @endforeach
			</select>
                        @error('company_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
		</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Employee Name:</strong>
                        <input type="text" name="employee_name" id="employee_name" value="{{ $employees->employee_name }}" class="form-control"
                            placeholder="Employee Name">
                        @error('employee_name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="employee_email" id="employee_email" class="form-control" placeholder="Company Email"
                            value="{{ $employees->employee_email }}">
                        @error('employee_email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mobile:</strong>
                        <input type="telephone" name="employee_mobile" id="employee_mobile" value="{{$employees->employee_mobile}}" class="form-control" placeholder="Mobile">
                        @error('employee_mobile')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Address:</strong>
                        <input type="text" name="employee_address" id="employee_address" value="{{ $employees->employee_address }}" class="form-control"
                            placeholder="Employee Address">
                        @error('employee_address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
		<div class="col-md-2">
			<img src="{{$employees->employee_photo_path}}" title="{{$employees->employee_name}}" alt="{{$employees->employee_name}}" width="20%" height="20%"/>
			&nbsp;<a href="#" title="Delete Logo" alt="Delete Logo"><span class="icon-close2"></span></a>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-10">
			<div class="form-group">
				<strong>Employee Photo:</strong><BR/>
				<div class="custom-file">
					<input type="file" name="file" class="custom-file-input" id="chooseFile">
					<label class="custom-file-label" for="chooseFile">Select file</label>
				</div>
				@error('employee_photo')
				<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
				@enderror
			</div>
		</div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
