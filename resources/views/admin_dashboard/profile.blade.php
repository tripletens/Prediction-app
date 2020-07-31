@extends('layouts.userapp')

@section('content')
<div id="right-panel" class="right-panel">

    @include('admin_dashboard.const.header')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Profile Card</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="{{ asset('images/avatar.png') }}" alt="Card image cap">
                    <h5 class="text-sm-center mt-2 mb-1">{{ strtoupper(auth()->user()->username) }}</h5>
                    <h6 class="text-sm-center mt-2 mb-1"><i>{{ strtolower(auth()->user()->email) }}</i></h6>
                    {{-- <div class="location text-sm-center"><i class="fa fa-map-marker"></i> California, United States</div> --}}
                </div>
                <hr>
                {{-- <div class="card-text text-sm-center">
                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- .content -->

<!-- /#right-panel -->

@endsection