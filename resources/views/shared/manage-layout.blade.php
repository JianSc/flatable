<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $title = (isset($title)) ? $title : config('app.web_title') ?>
    <title>{{ $title }} - 后台管理登录</title>
    <link rel="stylesheet" href="/res-manage/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="/res-manage/assets/css/site.css" type="text/css">
    <!--if lt IE 9-->
    <script type="text/javascript" src="/js/html5.js"></script>
    <script type="text/javascript" src="/js/respond.min.js"></script>
    <!--endif-->
    <script src="/js/jquery.js" type="text/javascript"></script>
    <script src="/js/jquery.form.js" type="text/javascript"></script>
</head>
<body>
<div class="loader-bg d-none">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar mt-5">
                <li class="nav-item">
                    <a href="/manage" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-grid"></i>
                        </span>
                        <span class="pcoded-mtext">工作台</span>
                    </a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a class="nav-link" style="cursor: pointer;">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">商品管理</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="layout-vertical.html">新增商品</a></li>
                        <li><a href="layout-horizontal.html">Horizontal</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a class="nav-link" style="cursor: pointer;">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">交易管理</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="bc_alert.html">Alert</a></li>
                        <li><a href="bc_button.html">Button</a></li>
                        <li><a href="bc_badges.html">Badges</a></li>
                        <li><a href="bc_breadcrumb-pagination.html">Breadcrumb & paggination</a></li>
                        <li><a href="bc_card.html">Cards</a></li>
                        <li><a href="bc_collapse.html">Collapse</a></li>
                        <li><a href="bc_carousel.html">Carousel</a></li>
                        <li><a href="bc_grid.html">Grid system</a></li>
                        <li><a href="bc_progress.html">Progress</a></li>
                        <li><a href="bc_modal.html">Modal</a></li>
                        <li><a href="bc_spinner.html">Spinner</a></li>
                        <li><a href="bc_tabs.html">Tabs & pills</a></li>
                        <li><a href="bc_typography.html">Typography</a></li>
                        <li><a href="bc_tooltip-popover.html">Tooltip & popovers</a></li>
                        <li><a href="bc_toasts.html">Toasts</a></li>
                        <li><a href="bc_extra.html">Other</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Forms &amp; table</label>
                </li>
                <li class="nav-item">
                    <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">Forms</span></a>
                </li>
                <li class="nav-item">
                    <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Bootstrap table</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Chart & Maps</label>
                </li>
                <li class="nav-item">
                    <a href="chart-apex.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-pie-chart"></i></span><span
                                class="pcoded-mtext">Chart</span></a>
                </li>
                <li class="nav-item">
                    <a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Pages</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-lock"></i></span><span
                                class="pcoded-mtext">Authentication</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="auth-signup.html" target="_blank">Sign up</a></li>
                        <li><a href="auth-signin.html" target="_blank">Sign in</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="sample-page.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-sidebar"></i></span><span
                                class="pcoded-mtext">Sample page</span></a></li>

            </ul>
        </div>
    </div>
</nav>
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="m-header" style="padding: 0 5px;">
        <a class="mobile-menu" id="mobile-collapse" style="cursor: pointer;"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="/res-manage/assets/images/logo.png" alt="" class="logo">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown">
                        <i class="icon feather icon-bell"></i>
                        <span class="badge badge-pill badge-danger">5</span>
                    </a>
                    {{-- message --}}
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="#!" class="m-r-10">mark as read</a>
                                <a href="#!">clear all</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="/res-manage/assets/images/user/avatar-1.jpg"
                                         alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>John Doe</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                        <p>New ticket Added</p>
                                    </div>
                                </div>
                            </li>
                            <li class="n-title">
                                <p class="m-b-0">EARLIER</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-2.jpg"
                                         alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                        <p>Prchace New Theme and make payment</p>
                                    </div>
                                </div>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-1.jpg"
                                         alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                        <p>currently login</p>
                                    </div>
                                </div>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-2.jpg"
                                         alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                        <p>Prchace New Theme and make payment</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="noti-footer">
                            <a href="#!">show all</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a class="dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="/res-manage/assets/images/user/avatar-2.jpg" class="img-radius"
                                 alt="User-Profile-Image">
                            <span>John Doe</span>
                        </div>
                        <ul class="pro-body">
                            <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i>
                                    Profile</a></li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My
                                    Messages</a></li>
                            <li>
                                <a id="menu-logout" href="/manage/logout" class="dropdown-item">
                                    <i class="feather icon-log-out"></i>
                                    注销
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        @yield('content')
    </div>
</div>
<script>
    $('a#menu-logout').on('click', function () {
        $('.loader-bg').removeClass('d-none');
    });
</script>
<script src="/res-manage/assets/js/vendor-all.min.js"></script>
<script src="/res-manage/assets/js/plugins/bootstrap.min.js"></script>
{{--<script src="/res-manage/assets/js/pcoded.min.js"></script>--}}
<script src="/res-manage/assets/js/plugins/apexcharts.min.js"></script>
</body>
</html>
