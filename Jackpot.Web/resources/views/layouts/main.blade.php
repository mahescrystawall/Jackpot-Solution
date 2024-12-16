<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  CSS -->
    <link href="{{ asset('assets/css/app.css')}}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <title>Jackpot</title>
</head>
<body>

    <div id="app">
        <div class="wrapper">
            <header class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="header-top col-md-12">
                            <div class="float-left">
                                <a href="/home" class="logo router-link-exact-active router-link-active logo-a">
                                    <!-- <img class="logo-icon" src="assets/img/99hub/logo.png"></a> -->
                                    <h3>CrystaHub</h3>
                                </a>
                            </div>
                            <ul class="float-right d-flex align-items-center">
                                <li class="search float-left">
                                    <input name="game_keyword" placeholder="All Events" autocomplete="off" type="text"
                                        class="ng-untouched ng-pristine ng-valid" aria-expanded="false"
                                        aria-autocomplete="list">
                                    <a href="javascript:void(0)"><i class="fas fa-search-plus"></i></a>
                                </li>
                                <li class="float-left download-apklink">
                                    <div><a href="/rules" class="rules-link m-r-5"><b>Rules</b></a></div>
                                </li>
                                <li class="ballance float-left">
                                    <div><span>Balance: </span><b><span>{{ $userData['pl'] }}</span></b></div>
                                    <div>
                                        <a href="javascript:void(0)">
                                            <span class="t-underline">Exposure: </span>
                                            <b><span class="t-underline">{{ $userData['expose'] }}</span></b>
                                        </a>
                                    </div>
                                </li><!---->

                                <li class="account float-left">
                                    <span>{{ $userData['name'] }}<i class="fas fa-chevron-down"></i></span>
                                    <ul>
                                        <li><a href="/report/account-statement">Account Statement</a></li>
                                        <li><a href="/report/profit-loss">Profit Loss Report</a></li>
                                        <li><a href="{{route('bet-history')}}">Bet History</a></li>
                                        <li><a href="{{route('unsettled_bets')}}">Unsetteled Bet</a></li>
                                        <li><a href="{{route('change-price-value')}}">Set Button Values</a></li>
                                        <li><a href="/change-password">Change Password</a></li>
                                        <li>
                                            <hr>
                                        </li>
                                        <li><a href="{{ route('logout') }}">signout</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <marquee scrollamount="3">{{ session('message')}}</marquee>
                        </div>
                        @php

                        $gamesList = session('games_list');
                        @endphp
                        <div class="header-bottom m-t-10 col-md-12">
                            <nav class="navbar navbar-expand-md btco-hover-menu">
                                <button type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                                    aria-controls="navbarNavDropdown" aria-expanded="false"
                                    aria-label="Toggle navigation" class="navbar-toggler">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse">
                                    <ul class="list-unstyled navbar-nav">
                                        <li class="nav-item active">
                                            <a href="/home"
                                                routerlinkactive="router-link-exact-active router-link-active">
                                                <b>Home</b>
                                            </a>
                                        </li>
                                        @if (isset($gamesList))
                                        @foreach ($gamesList as $menu_games)
                                        <li class="nav-item">
                                            <a href="/casino"
                                                routerlinkactive="router-link-exact-active   router-link-active">
                                                <b>{{$menu_games['name']}}</b><em>New</em>
                                            </a>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                            </nav>
                        </div>
                    </div>
                    <div></div>
                    <div class="modal-market"></div>
                </div>
            </header>

            <div class="main">
                <div id="toaster-container" class="toaster-container" style="position: absolute; z-index: 1050;"></div>

                <div class="container-fluid container-fluid-5">
                    <div class="row row5">
                        <div class="sidebar d-none col-md-2 mt-1 d-md-block">
                            <app-sidebar>
                                <div data-bs-toggle="collapse" data-bs-target=".casino" class="sidebar-title">
                                    <h5 class="d-inline-block m-b-0">Others</h5>
                                </div>
                                <nav class="collapse casino show side-ul">
                                    <ul>
                                        <li class="nav-item">
                                            <a href="/casino-detail/99995/150033"
                                                routerlink="/casino-detail/99995/150033" class="nav-link"><span> TP T20
                                                </span></a>
                                        </li>
                                    </ul>
                                </nav>
                                <div data-bs-toggle="collapse" data-bs-target=".events" aria-controls="events"
                                    aria-expanded="true" role="button" class="sidebar-title m-t-5 theme2bg">
                                    <h5 class="text-white d-inline-block m-b-0">All Sports</h5>
                                </div>
                                <div id="events" class="mtree-main collapse events show">
                                    <div class="ps">
                                        <nav>

                                        </nav>
                                    </div>
                                </div>
                            </app-sidebar>
                        </div>
                        <div class="col-md-10 featured-box">
                            <!-- <div class="home-products-container mt-1">
                                    <div class="row row5">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </div> -->
                            <!-- Page -->
                            @yield('content')
                            <!-- Page -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- Add these just before closing the </body> tag for JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-full-width", // Full width at the top
                "containerId": "toaster-container", // Use the custom container
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "500000000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        </script>
        @yield('scripts')
    </footer>
</body>

</html>
