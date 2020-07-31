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

        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">WELCOME</span> 
                {{ strtoupper(auth()->user()->username) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            
                <div class="card-body pb-0">
                    <div class="card text-white bg-flat-color-1">
                        <div class="card-body pb-0"  style="margin:0 auto; text-align:center;color:#fff;padding:20px;">
                            <span>
                                <i class="fa fa-gamepad fa-5x"></i>
                                <h3><a href="/user/games/view" style="color:#fff;">View Games </a><br></h3>
                            </span>
                        </div>
                    </div>
                    
                </div>
            
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
            
                <div class="card-body pb-0">
                    <div class="card text-white bg-flat-color-4">
                        <div class="card-body pb-0"  style="margin:0 auto; text-align:center;color:#fff;padding:20px;">
                            <span>
                                <i class="fa fa-key fa-5x"></i>
                                <h3><a href="/user/account/activate" style="color:#fff;">Activate Account</a><br></h3>
                            </span>
                        </div>
                    </div>
                    
                </div>

        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
           
                <div class="card-body pb-0">
                    <div class="card text-white bg-flat-color-3">
                        <div class="card-body pb-0"  style="margin:0 auto; text-align:center;color:#fff;padding:20px;">
                            <span>
                                <i class="fa fa-comment fa-5x"></i>
                                <h3><a href="/user/ticket/open" style="color:#fff;">Create A Ticket</a><br></h3>
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-2">
                <div class="card-body pb-0">
                    <div class="card text-white bg-flat-color-4">
                        <div class="card-body pb-0"  style="margin:0 auto; text-align:center;color:#fff;padding:20px;">
                            <span>
                                <i class="fa fa-user fa-5x"></i>
                                <h3><a href="/user/profile" style="color:#fff;">Profile</a><br></h3>
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-2">
                <div class="card-body pb-0">
                    <div class="card text-white bg-flat-color-3">
                        <div class="card-body pb-0"  style="margin:0 auto; text-align:center;color:#fff;padding:20px;">
                            <span>
                                <i class="fa fa-user fa-5x"></i>
                                <h3><a href="/user/profile/settings" style="color:#fff;">Edit Profile</a><br></h3>
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .content -->

<!-- /#right-panel -->

@endsection