@extends('templates.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Company</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('companies.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('companies.update',$companies->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
		<input type="hidden" name="companyID" id="companyID" value="{{$companies->id}}"/>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        <input type="text" name="name" value="{{ $companies->name }}" class="form-control"
                            placeholder="Company name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Company Email"
                            value="{{ $companies->email }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Address:</strong>
                        <input type="text" name="address" value="{{ $companies->address }}" class="form-control"
                            placeholder="Company Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
		        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Website:</strong>
                        <input type="text" name="website" class="form-control" value="{{$companies->website}}" placeholder="Company Website">
                        @error('website')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
		        <div class="col-md-2">
                    <img src="{{$companies->logo}}" title="{{$companies->name}}" alt="{{$companies->name}}" width="20%" height="20%"/>
                    &nbsp;<a href="#" title="Delete Logo" alt="Delete Logo"><span class="icon-close2"></span></a>
                </div>
		        <div class="col-xs-12 col-sm-12 col-md-10">
                    <div class="form-group">
                        <strong>Company Logo:</strong><BR/>
	 		            <div class="custom-file">
                		    <input type="file" name="file" class="custom-file-input" id="chooseFile">
                		    <label class="custom-file-label" for="chooseFile">Select file</label>
            		    </div>
		 	            @error('logo')
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
