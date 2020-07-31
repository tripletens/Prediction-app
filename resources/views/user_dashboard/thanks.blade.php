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
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Payment </strong>
                        </div>
                        <div class="card-body text-center">
                           <h2 class="text-center"> Payment Confirmed </h2>
                           <p>More Info about the package </p>
                           <span class="alert alert-info">Package will be activated in less than 24 hours, Thanks </span>
                           <br><br>
                           
                             
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
        <!-- .animated -->
</div>
    <!-- .content -->

                            
                            
                        
<!-- .content -->

<!-- /#right-panel -->

@endsection