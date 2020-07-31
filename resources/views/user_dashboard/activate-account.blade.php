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
        <h1>Payment Method</h1><br>
        <span class="alert alert-info">
            Pay into this Bitcoin Wallet Address and your payment  
            will be confirmed in 24 hours and then your account will be activated.<br><br><br><br>
            
        </span>
        <span class="alert alert-danger">
            <i class="fa fa-btc"></i> Address :  dhjfdjfjhsdhsj3490490343490904838408
        </span>
    </div>
</div>
<!-- .content -->

<!-- /#right-panel -->

@endsection