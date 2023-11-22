<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('admin_template/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand" href="#">PhongTro123</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown js-drop-menu">
                        <a class="nav-link dropdown-toggle" href="#" id="menuAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ pare_url_file(get_data_user('admins','avatar')) }}" width="40" height="40" class="rounded-circle"> {{ get_data_user('admins','name') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="menuAccount">
                            <a class="dropdown-item" href="{{ route('get_admin.logout') }}" title="Logout">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link active" aria-current="page" href="{{ route('get_admin.home.index') }}">Home</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.location.index' ? 'active' : '' }}" href="{{ route('get_admin.location.index') }}">Location</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.category.index' ? 'active' : '' }}" href="{{ route('get_admin.category.index') }}" title="Category">Category</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.user.index' ? 'active' : '' }}" href="{{ route('get_admin.user.index') }}" title="Category">User</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.room.index' ? 'active' : '' }}" href="{{ route('get_admin.room.index') }}" title="Category">Room</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.recharge.index' ? 'active' : '' }}" href="{{ route('get_admin.recharge.index') }}" title="Category">Recharge</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.recharge_pay.index' ? 'active' : '' }}" href="{{ route('get_admin.recharge_pay.index') }}" title="Category">Pay</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.article.index' ? 'active' : '' }}" href="{{ route('get_admin.article.index') }}" title="Article">Article</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.permission.index' ? 'active' : '' }}" href="{{ route('get_admin.permission.index') }}" title="Article">Permission</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.role.index' ? 'active' : '' }}" href="{{ route('get_admin.role.index') }}" title="Article">Role</a>
                        <a class="nav-link {{ \Request::route()->getName() == 'get_admin.account.index' ? 'active' : '' }}" href="{{ route('get_admin.account.index') }}" title="Article">Account</a>

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                          
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                       
                    </div>
                    {{-- end --}}
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('')}}admin_template/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('') }}admin_template/assets/demo/chart-area-demo.js"></script>
        <script src="{{asset('')}}admin_template/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
<script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        $(function (){
            $(".js-drop-menu").click( function (event){
                console.log('------------ click');
                let $this = $(this);
                if ($this.hasClass('show')) {
                    $this.removeClass('show')
                    $this.find(".dropdown-menu").removeClass('show');
                } else  {
                    $this.addClass('show')
                    $this.find(".dropdown-menu").addClass('show');
                }
            })
        })
    </script>
    </body>
</html>
