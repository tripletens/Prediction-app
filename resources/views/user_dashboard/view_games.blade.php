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
    <style type="text/css">
        .card{}
    </style>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row"style="">

                <div class="col-md-6">
                    <div class="card bg-primary text-white">
                        <div class="card-header">
                            <strong class="card-title">Basic Package</strong>
                        </div>
                        <a href="/user/pay/basic" style="color: white">
                            <div class="card-body">
                                <span style="margin:30%;margin-left:35%;">
                                    <i class="fas fa-award fa-10x"></i>
                                    
                                    <br><br>
                                    <h3 style="text-align: center;"> PACKAGE DESCRIPTION HERE
                                    PACKAGE DESCRIPTION HERE
                                    PACKAGE DESCRIPTION HERE
                                    PACKAGE DESCRIPTION HERE </h3>
                                </span>
                            </div>
                        </a>
                        <div class="card-footer bg-primary">
                            <button class="btn btn-md btn-danger btn-block"  style="float:right;">Pay</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-success text-white">
                        <div class="card-header">
                            <strong class="card-title">Premium Package </strong>
                        </div>
                        <a href="/user/pay/premium" style="color: white">
                            <div class="card-body">
                                <span style="margin:30%;">
                                   <i class="fas fa-box-open  fa-10x"></i>
                                </span>
                                <br><br>
                                <h3 style="text-align: center;"> PACKAGE DESCRIPTION HERE
                                PACKAGE DESCRIPTION HERE
                                PACKAGE DESCRIPTION HERE
                                PACKAGE DESCRIPTION HERE </h3>
                            </div>
                            <div class="card-footer bg-success">
                                <button class="btn btn-md btn-danger btn-block"  style="float:right;">Pay</button>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="card bg-warning text-white">
                        <div class="card-header">
                            <strong class="card-title">Gold Package</strong>
                        </div>
                        <a href="/user/pay/gold" style="color: white">
                        <div class="card-body">
                            <span style="margin:30%;">
                                <i class="fas fa-coins fa-10x"></i>
                            </span>
                            <br><br>
                            <h3 style="text-align: center;"> PACKAGE DESCRIPTION HERE
                            PACKAGE DESCRIPTION HERE
                            PACKAGE DESCRIPTION HERE
                            PACKAGE DESCRIPTION HERE </h3>
                        </div>
                        <div class="card-footer bg-warning">
                            <button class="btn btn-md btn-danger btn-block"  style="float:right;">Pay</button>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <strong class="card-title">Ultimate Package </strong>
                        </div>
                        <a href="/user/pay/ultimate" style="color: white">
                            <div class="card-body">
                                <span style="margin:30%;">
                                     <i class="far fa-star fa-10x"></i>
                                </span>
                                <br><br>
                                <h3 style="text-align: center;"> PACKAGE DESCRIPTION HERE
                                PACKAGE DESCRIPTION HERE
                                PACKAGE DESCRIPTION HERE
                                PACKAGE DESCRIPTION HERE </h3>
                            </div>
                            <div class="card-footer bg-dark">
                                
                                <button class="btn btn-md btn-danger btn-block"  style="float:right;">Pay</button>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- .content -->
</div>
                            {{-- `game-code`, `picture`, `status`, --}}

                            
                            {{--  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Game Code</th>
                                        <th>Picture</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($games) > 0 )
                                        
                                        @foreach ($games as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->game_code }}</td>
                                                <td>
                                                    <a href="/user/games/view/{{ $item->id }}" class="btn btn-lg"> View Game Picture</a>
                                                </td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <br>
                                                        <span class="alert alert-danger"> Not Available</span>
                                                        <br><br>
                                                    @else 
                                                        <br>
                                                        <span class="alert alert-success">Available</span>  
                                                    @endif
                                                </td>
                                            </tr>
                                        
                                        @endforeach
                                    @else
                                        <span class="alert alert-danger"> No Game Available now</span>
                                        <br><br>
                                    @endif
                                    
                                    
                                </tbody>
                            </table>  --}}
               
<!-- .content -->

<!-- /#right-panel -->

@endsection