@extends('layouts.userapp')

@section('content')
<div id="right-panel" class="right-panel">

    @include('user_dashboard.const.header')

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
        <div class="col-sm-12 fade show">
            <div class="card">
                <div class="card-header">
                   Change <strong>Details</strong> 
                </div>
                <div class="card-body card-block">
                    @include('inc.messages')
                    <form action="{{ route('user-profile-edit') }}" method="POST" class="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username" class=" form-control-label">Username</label>
                            <input type="text" id="username" name="username" value = "{{ auth()->user()->username}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class=" form-control-label">Email Address</label>
                            <input type="email" id="email" name="email" readonly="true" value = "{{ auth()->user()->email}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class=" form-control-label">Old Password</label>
                            <input type="password" id="old-password" name="old-password"  placeholder="Enter Old Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class=" form-control-label">New Password</label>
                            <input type="password" id="new-password" name="new-password" placeholder="Enter New Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class=" form-control-label">Confirm New Password</label>
                            <input type="password" id="confirm-new-password" name="confirm-new-password" placeholder="Confirm New Password" class="form-control">
                        </div>
                </div>
                <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .content -->

<!-- /#right-panel -->

@endsection