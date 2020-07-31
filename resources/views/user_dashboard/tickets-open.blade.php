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
                   Create a <strong>Ticket</strong> 
                </div>
                @include('inc.messages')
                <div class="card-body card-block">
                    <form method="POST" action="{{ route('save-ticket') }}" class="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class=" form-control-label">Title</label>
                            <input type="text" id="nf-email" name="title" placeholder="Enter Ticket Title.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message" class=" form-control-label">Message</label>
                            <textarea cols="20" rows="10" class="form-control" name="message"></textarea>
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