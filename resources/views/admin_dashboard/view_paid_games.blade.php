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
                            <strong class="card-title">Over 1.5 Games</strong>
                        </div>
                        <div class="card-body">
                            {{-- `game-code`, `picture`, `status`, --}}

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-yesterday-tab" data-toggle="pill" href="#pills-yesterday" role="tab" aria-controls="pills-yesterday" aria-selected="true">Yesterday</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-today-tab" data-toggle="pill" href="#pills-today" role="tab" aria-controls="pills-today" aria-selected="false">Today</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-tomorrow-tab" data-toggle="pill" href="#pills-tomorrow" role="tab" aria-controls="pills-tomorrow" aria-selected="false">Tomorrow</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-yesterday" role="tabpanel" aria-labelledby="pills-yesterday-tab">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Match Time</th>
                                        <th>Team A</th>
                                        <th>Team B</th>
                                        <th>% Confidence</th>
                                        <th>Result</th>
                                        <th>Odds</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th>Edit Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($yesterday) > 0)
                                        @foreach($yesterday as $item_y)
                                        <tr>
                                            <td>{{ $item_y-> match_time}}</td>
                                            <td>{{ $item_y-> team_a}}</td>
                                            <td>
                                               {{ $item_y-> team_b}}
                                            </td>
                                            <td>
                                              {{ $item_y-> percent}} %
                                            </td>
                                            <td>
                                               
                                                {{ $item_y-> result_a}} - {{ $item_y-> result_b}} 
                                            </td>
                                            <td> 
                                                {{ $item_y-> team_a_odd}} - 
                                                {{ $item_y-> team_b_odd}} 
                                            </td>
                                            <td>
                                                 @if ($item_y->status == 0)
                                                    
                                                    <span class="alert alert-danger">Inactive</span>
                                                    <br><br>
                                                @else 
                                                    
                                                    <span class="alert alert-success">Active</span>  
                                                @endif
                                            </td>
                                            <td>
                                               <form method="POST" action="/admin/games/activate/{{ $item_y->category }}/{{ $item_y->game_type }}/{{ $item_y->id }}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-success" type="submit">Activate Game</button>
                                                </form>
                                                <form method="POST" action="/admin/games/deactivate/{{ $item_y->category }}/{{ $item_y->game_type }}/{{ $item_y->id }}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger" type="submit">Deactivate Game</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="/admin/games/update_result/{{ $item_y->category }}/{{ $item_y->game_type }}/{{ $item_y->id }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="result_a" placeholder="{{ $item_y->team_a }}'s Score">
                                                        <input type="number" class="form-control" name="result_b" placeholder="{{ $item_y->team_b }}'s Score">
                                                        <input type="submit" value="Add" class="btn btn-success">
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        {{-- <span class="alert alert-info">Please be Patience. Games are loading...</span> --}}
                                    @endif
                                </tbody>
                            </table> 
                          </div>
                          <div class="tab-pane fade" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab">
                        
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Match Time</th>
                                        <th>Team A</th>
                                        <th>Team B</th>
                                        <th>% Confidence</th>
                                        <th>Result</th>
                                        <th>Odds</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th>Edit Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($today) > 0)
                                        @foreach($today as $item_d)
                                        <tr>
                                            <td>{{ $item_d-> match_time}}</td>
                                            <td>{{ $item_d-> team_a}}</td>
                                            <td>
                                               {{ $item_d-> team_b}}
                                            </td>
                                            <td>
                                              {{ $item_d-> percent}} %
                                            </td>
                                            <td>
                                               
                                                {{ $item_d-> result_a}} - {{ $item_d-> result_b}} 
                                            </td>
                                            <td> 
                                                {{ $item_d-> team_a_odd}} - 
                                                {{ $item_d-> team_b_odd}} 
                                            </td>
                                            <td>
                                                 @if ($item_d->status == 0)
                                                    
                                                    <span class="alert alert-danger">Inactive</span>
                                                    <br><br>
                                                @else 
                                                    
                                                    <span class="alert alert-success">Active</span>  
                                                @endif
                                            </td>
                                            <td>
                                               <form method="POST" action="/admin/games/activate/{{ $item_d->category }}/{{ $item_d->game_type }}/{{ $item_d->id }}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-success" type="submit">Activate Game</button>
                                                </form>
                                                <form method="POST" action="/admin/games/deactivate/{{ $item_d->category }}/{{ $item_d->game_type }}/{{ $item_d->id }}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger" type="submit">Deactivate Game</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="/admin/games/update_result/{{ $item_d->category }}/{{ $item_d->game_type }}/{{ $item_d->id }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="result_a" placeholder="{{ $item_d->team_a }}'s Score">
                                                        <input type="number" class="form-control" name="result_b" placeholder="{{ $item_d->team_b }}'s Score">
                                                        <input type="submit" value="Add" class="btn btn-success">
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        {{-- <span class="alert alert-info">Please be Patience. Games are loading...</span> --}}
                                    @endif
                                </tbody>
                            </table> 
                          </div>
                            <div class="tab-pane fade" id="pills-tomorrow" role="tabpanel" aria-labelledby="pills-tomorrow-tab">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Match Time</th>
                                        <th>Team A</th>
                                        <th>Team B</th>
                                        <th>% Confidence</th>
                                        <th>Result</th>
                                        <th>Odds</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th>Edit Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($tomorrow) > 0)
                                        @foreach($tomorrow as $item_to)
                                        <tr>
                                            <td>{{ $item_to-> match_time}}</td>
                                            <td>{{ $item_to-> team_a}}</td>
                                            <td>
                                               {{ $item_to-> team_b}}
                                            </td>
                                            <td>
                                              {{ $item_to-> percent}} %
                                            </td>
                                            <td>
                                               
                                                {{ $item_to-> result_a}} - {{ $item_to-> result_b}} 
                                            </td>
                                            <td> 
                                                {{ $item_to-> team_a_odd}} - 
                                                {{ $item_to-> team_b_odd}} 
                                            </td>
                                            <td>
                                                 @if ($item_to->status == 0)
                                                    
                                                    <span class="alert alert-danger">Inactive</span>
                                                    <br><br>
                                                @else 
                                                    
                                                    <span class="alert alert-success">Active</span>  
                                                @endif
                                            </td>
                                            <td>
                                               <form method="POST" action="/admin/games/activate/{{ $item_to->category }}/{{ $item_to->game_type }}/{{ $item_to->id }}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-success" type="submit">Activate Game</button>
                                                </form>
                                                <form method="POST" action="/admin/games/deactivate/{{ $item_to->category }}/{{ $item_to->game_type }}/{{ $item_to->id }}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger" type="submit">Deactivate Game</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="/admin/games/update_result/{{ $item_to->category }}/{{ $item_to->game_type }}/{{ $item_to->id }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="result_a" placeholder="{{ $item_to->team_a }}'s Score">
                                                        <input type="number" class="form-control" name="result_b" placeholder="{{ $item_to->team_b }}'s Score">
                                                        <input type="submit" value="Add" class="btn btn-success">
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        {{-- <span class="alert alert-info">Please be Patience. Games are loading...</span> --}}
                                    @endif
                                </tbody>
                            </table>
                            </div>
                        </div>
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