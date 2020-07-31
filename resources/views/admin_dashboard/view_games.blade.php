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
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            {{-- `game-code`, `picture`, `status`, --}}
                            <table id="bootstrap-data-table" class="table table-striped table-bordered ">
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
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- .content -->
</div>
<!-- .content -->

<!-- /#right-panel -->

@endsection