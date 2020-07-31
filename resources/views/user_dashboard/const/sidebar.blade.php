    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button> --}}
                <a class="navbar-brand">{{ config('app.name') }}</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <br>
                <ul class="nav navbar-nav">
                    <li class="active">
                        @if (auth()->user()->role == 'admin')
                            <a href="/admin/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        @else
                            <a href="/home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        @endif  
                        
                    </li>
                    <h3 class="menu-title">Menu</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-laptop"></i>Free Games</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            @if (auth()->user()->role == 'admin')
                                <li><i class="fa fa-puzzle-piece"></i><a href="/admin/games/view/free/1.5"> Free Over 1.5 Predictions </a></li>
                                <li><i class="fa fa-puzzle-piece"></i><a href="/admin/games/view/free/2.5"> Free Over 2.5 Predictions </a></li>
                                
                            @else
                                <li><i class="fa fa-puzzle-piece"></i><a href="/user/games/view/free/1.5"> Over 1.5 </a></li>
                                <li><i class="fa fa-puzzle-piece"></i><a href="/user/games/view/free/2.5"> Over 2.5 </a></li>
                            @endif         
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-laptop"></i>Paid Games</a>
                        <ul class="sub-menu children dropdown-menu">
                            @if (auth()->user()->role == 'user' && auth()->user()->activated == true)
                               <li><i class="fa fa-puzzle-piece"></i><a href="/user/games/view/paid/1.5"> View Over 1.5 odds</a></li>
                            @else
                                <li><i class="fa fa-puzzle-piece"></i><a href="/admin/games/view/paid/1.5">View Over 1.5 Odds</a></li>
                                <li><i class="fa fa-puzzle-piece"></i><a href="/admin/games/view/paid/2.5">View Over 2.5 Odds</a></li>
                            @endif
                                  
                        </ul>
                    </li>
                    @if (auth()->user()->role == 'admin')
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <i class="menu-icon fa fa-laptop"></i>Games</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('add-game') }}">Add Game</a></li>
                            </ul>
                        </li>
                    @endif  
                    <li class="menu-item-has-children dropdown">
                        @if (auth()->user()->role == 'admin')
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Users Account</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-user"></i><a href="{{ route('admin-users') }}">View Users</a></li>
                                
                            </ul>
                        @else
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-key"></i>Pick a Package </a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('view-packages') }}">Pick a Package </a></li>
                                {{-- <li><i class="fa fa-money"></i><a href="{{ route('activate-account') }}">Activate / Pay </a></li> --}}
                                
                            </ul>
                        @endif
                        
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-ticket"></i>Tickets
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            @if (auth()->user()->role == 'user')
                                <li><i class="menu-icon fa fa-ticket"></i><a href="{{ route('open-ticket') }}">Open Tickets</a></li>
                                <li><i class="menu-icon fa fa-ticket"></i><a href="{{ route('view-ticket') }}">View Tickets</a></li>
                            @else
                                
                            <li><i class="menu-icon fa fa-ticket"></i><a href="{{ route('admin-open-ticket') }}">Open Tickets</a></li>
                            <li><i class="menu-icon fa fa-ticket"></i><a href="{{ route('admin-view-ticket') }}">View Tickets</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-cog"></i>My Account
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            @if (auth()->user()->role == 'admin')
                                <li><i class="menu-icon fa fa-user"></i><a href="{{ route('admin-profile') }}">Profile </a></li>
                                <li><i class="menu-icon fa fa-cog"></i><a href="{{ route('admin-profile-settings') }}">Settings</a></li>
                            @else
                                <li><i class="menu-icon fa fa-user"></i><a href="{{ route('user-profile') }}">Profile </a></li>
                                <li><i class="menu-icon fa fa-cog"></i><a href="{{ route('user-profile-settings') }}">Settings</a></li>
                            @endif 
                            
                        </ul>
                    </li>
                    <button class="btn btn-danger btn-block" ><i class="menu-icon fa fa-sign-out-alt"></i><a href="{{ route('logout') }}" style="color:#fff;">Logout </a></button>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->