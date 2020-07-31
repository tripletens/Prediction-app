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
                            {{--  `id`, `username`, `email`, `password`, `role`, `activated`, 
                                `status`, `remember_token`, `created_at`, `updated_at`, `ending-date` --}}
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Activation Status</th>
                                        <th>Expiry Date</th>
                                        <th>Status</th>
                                        <td> Activate Users Account</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($users) > 0 )
                                        
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>
                                                    {{ $item->email }}
                                                </td>
                                                <td>{{ $item->role }}</td>
                                                <td>
                                                    @if ($item->activated == 0)
                                                        <br>
                                                        <span class="alert alert-danger">Inactive</span>
                                                        <br><br>
                                                    @else 
                                                        <br>
                                                        <span class="alert alert-success">Active</span>  
                                                    @endif
                                                </td>
                                                <td>{{ $item->ending_date }}</td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <br>
                                                        <span class="alert alert-danger">Inactive</span>
                                                        <br><br>
                                                    @else 
                                                        <br>
                                                        <span class="alert alert-success">Active</span>  
                                                    @endif
                                                </td>
                                                <td>
                                                    <form method="POST" action="/admin/users/activate/{{ $item->id }}">
                                                        {{ csrf_field() }}
                                                        <div class='form-group'>
                                                            <label for='duration'>Duration : </label>
                                                            <select name="duration" class='form-control'>
                                                                <option name="duration[]" value="3"> Three Months (12 weeks) at 35 <span class="glyphicon glyphicon-euro"></span> Euro </option>
                                                                <option name="duration[]" value="12"> Twelves Months (52 weeks) at 55 <span class="glyphicon glyphicon-euro"></span> Euro </option>
                                                            </select>
                                                        </div>
                                                        
                                                        <button class="btn btn-success" type="submit">Activate Account</button>
                                                    </form>
                                                    <form method="POST" action="/admin/users/deactivate/{{ $item->id }}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger" type="submit">Deactivate Account</button>
                                                    </form>
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