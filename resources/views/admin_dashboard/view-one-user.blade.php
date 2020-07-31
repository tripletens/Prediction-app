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
                    @include('inc.messages')
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Game Details</strong>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <h2>Game Code : {{ $game->game_code }}</h2>
                            </div>
                            <div class="col-md-4">
                                <img class="card-img-top" src="{{ asset('uploads/') }}/{{ $game->picture }}" alt="Card image cap">
                                
                                @if ($game->status == 1 )
                                    <br><br>
                                    <span class="alert alert-success">Game is Currently Available, Good Luck!</span>
                                @else
                                    <br><br>
                                    <span class="alert alert-danger">Game is Currently Expired. </span>
                                @endif
                                
                            </div>
                           <div class="col-md-4">
                               <form method="POST" action="/admin/activate-game/{{ $game->id }}">
                                   {{ csrf_field() }}
                                    <button class="btn btn-success" type="submit"> Activate Game</button>
                               </form>
                               <form method="POST" action="/admin/deactivate-game/{{ $game->id }}">
                                   {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit"> Deactivate Game</button>
                               </form>
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