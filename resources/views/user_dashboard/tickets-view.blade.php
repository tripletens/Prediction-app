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
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Reply</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($tickets) > 0)
                                        @foreach ($tickets as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title}}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>{{ $item->reply }}</td>
                                                <td> 
                                                    @if ($item->status == 1)
                                                        <br>
                                                        <span class="alert alert-info">Processing</span>
                                                        <br><br>
                                                    @else
                                                        <br><br>
                                                        <span class="alert alert-success">Answered</span>
                                                    @endif 
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    @else
                                        <br><br>
                                        <span class="alert alert-info">Create A ticket </span>
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