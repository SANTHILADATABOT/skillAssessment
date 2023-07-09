@extends('templates.layouts.default')
@section('content')

<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-office icon-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{$companies}}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Total Companies</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-users4 icon-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{$employees}}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Total Employees</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection