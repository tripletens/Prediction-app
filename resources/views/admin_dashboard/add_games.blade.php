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
                @include('inc.messages')
                <div class="col-md-12">
                    <div class="card" style="padding:30px;">
                        <h1 class="text-center">Add A Game </h1>
                        <form method="POST" style="margin:0 auto;width:80%;" action="{{ route('process-add') }}" >
                            {{ csrf_field() }}
                            <div class="form-group"> 
                                 
                                <label for="match_time">Match Time</label>
                                <input type="time" name="match_time" class="form-control" aria-placeholder="match time">
                            </div>
                            <div class="form-group">
                                <label>Match Date</label>
                                <input type="date" name="match_date" class="form-control">
                            </div>  
                            
                            <div class="form-group">
                                <label>Home Team</label>
                                <input type="text" class="form-control" name="team_a" placeholder="Enter Home Team">
                            </div>
                            <div class="form-group">
                                <label>Away Team</label>
                                <input type="text" class="form-control" name="team_b" placeholder="Enter Away Team">
                            </div>
                            <div class="form-group">
                                <label>Percent Accuracy</label>
                                <input type="number" class="form-control" name="percent" placeholder="Enter Prediction % Accuracy">
                            </div>

                            <div class="form-group">
                                <label>Game Type</label>
                                <select class="form-control" name="game_type" placeholder="Enter type i.e over 1.5 , over 2.5">
                                    <option name="game_type[]" value="">Select a Game Type i.e 1.5 , 2.5</option>
                                    <option name="game_type[]" value="1.5">Over 1.5 Odds </option>
                                    <option name="game_type[]" value="2.5">Over 2.5 Odds </option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Team A Odd</label>
                                <input type="float" class="form-control" name="team_a_odd" placeholder="Enter Team A Real Odd">
                            </div>
                             <div class="form-group">
                                <label>Team B odd</label>
                                <input type="float" class="form-control" name="team_b_odd" placeholder="Enter Team B Real Odd ">
                            </div>
                            
                             <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    <option name="category[]" value="">Select a Category either Free or Paid</option>
                                    <option name="category[]" value="free">Free </option>
                                    <option name="category[]" value="paid">Paid </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Package</label>
                                <select class="form-control" name="package">
                                    <option name="package[]" value="">Select a Package i.e basic , premium , gold , ultimate</option>
                                    <option name="package[]" value="basic">Basic </option>
                                    <option name="package[]" value="premium">Premium</option>
                                    <option name="package[]" value="gold">Gold</option>
                                    <option name="package[]" value="ultimate">Ultimate</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>
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