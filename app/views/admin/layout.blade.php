<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Админ панель</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <link href="/backend/css/style.css" rel="stylesheet" type="text/css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
        <script src="/backend/js/plugins/ionslider/ion.rangeSlider.min.js"></script>

        <script src="/backend/js/plugins/bootstrap-confirm/bootbox.min.js"></script>
        <script src="/backend/js/plugins/bootstrap-confirm/jquery.confirm.min.js"></script>

        @if (substr(Route::currentRouteAction(), -5) === 'index')
        <link href="/backend/css/datatables/data-tables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/backend/css/datatables/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('/backend/js/plugins/datatables/jquery.datatables.min.js') }}"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script src="{{ asset('/backend/js/plugins/datatables/script.js') }}"></script>
        @endif
        <script src="/backend/js/scripts/app.js"></script>
    </head>
    <body class="skin-blue">

    <header class="header">
        <a href="/admin" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            Панель управления
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!--li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="img/avatar3.png" class="img-circle" alt="User Image"/>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-warning"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users warning"></i> 5 new members joined
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ion ion-ios7-cart success"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ion ion-ios7-person danger"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-tasks"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li-->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span> {{ Auth::check() ? Auth::user()->firstname : '' }} <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <!--li class="user-header bg-light-blue">
                                <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                <p>
                                    {{ Auth::check() ? Auth::user()->firstname : '' }}
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>

                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{{ URL::to('admin/logout') }}}" class="btn btn-default btn-flat">Выход</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <!--div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div-->
                        <div class="pull-left info">
                            <p>Привет {{ Auth::check() ? Auth::user()->firstname : '' }}</p>

                            <!--a href="#"><i class="fa fa-circle text-success"></i> Online</a-->
                        </div>
                    </div>
                    <!-- search form -->
                    <!--form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview {{ Request::is('admin/article*') || Request::is('admin/page*') || Request::is('admin/post*') || Request::is('admin/portfolio*') || Request::is('admin/video*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Контент</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('admin/article*') ? 'active' : '' }}"><a href="{{{ URL::to('admin/article') }}}"><i class="fa fa-angle-double-right active"></i> Статьи</a></li>
                                <li class="{{ Request::is('admin/page*') ? 'active' : '' }}"><a href="{{{ URL::to('admin/page') }}}"><i class="fa fa-angle-double-right"></i> Страницы</a></li>
                                <li class="{{ Request::is('admin/post*') ? 'active' : '' }}"><a href="{{{ URL::to('admin/post') }}}"><i class="fa fa-angle-double-right"></i> Блог</a></li>
                                <li class="{{ Request::is('admin/portfolio*') ? 'active' : '' }}"><a href="#"><i class="fa fa-angle-double-right"></i> Наши работы</a></li>
                                <!--li class="{{ Request::is('admin/video*') ? 'active' : '' }}"><a href="{{{ URL::to('admin/video') }}}"><i class="fa fa-angle-double-right"></i> Видео</a></li-->
                            </ul>
                        </li>
                        <li class="treeview {{ Request::is('admin/category*') || Request::is('admin/product*') || Request::is('admin/order*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Магазин</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}"><a href="{{{ URL::to('admin/category') }}}"><i class="fa fa-angle-double-right active"></i> Категории</a></li>
                                <li class="{{ Request::is('admin/product*') ? 'active' : '' }}"><a href="{{{ URL::to('admin/product') }}}"><i class="fa fa-angle-double-right"></i> Товары</a></li>
                                <li class="{{ Request::is('admin/customer*') ? 'active' : '' }}"><a href="{{{ URL::to('admin/customer') }}}"><i class="fa fa-angle-double-right"></i> Покупатели</a></li>
                                <li class="{{ Request::is('admin/order*') ? 'active' : '' }}"><a href="{{{ URL::to('admin/order') }}}"><i class="fa fa-angle-double-right"></i> Заказы</a></li>
                            </ul>
                        </li>

                        <li class="treeview {{@$this->tv_module}}">
                            <a href="#">
                                <i class="fa fa-desktop"></i>
                                <span>Телевидение</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ @$this->tv_articles_controller }}"><a href="#"><i class="fa fa-angle-double-right active"></i> Пакеты телеканалов</a></li>
                                <li class="{{ @$this->tv_articles_controller }}"><a href="#"><i class="fa fa-angle-double-right active"></i> Спутники</a></li>
                                <li class="{{ @$this->tv_static_controller }}"><a href="#"><i class="fa fa-angle-double-right"></i> Телеканалы</a></li>
                                <li class="{{ @$this->tv_posts_controller }}"><a href="#"><i class="fa fa-angle-double-right"></i> Список телеканалов</a></li>
                            </ul>
                        </li>

                        <li class="treeview  {{ Request::is('admin/setting*') || Request::is('admin/user*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Конфигурация</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ Request::is('admin/setting*') ? 'active' : '' }}"><a href="/admin/setting"><i class="fa fa-angle-double-right active"></i> Настройки</a></li>
                                <!--li class="{{ @$this->static_controller }}"><a href="#"><i class="fa fa-angle-double-right"></i> Права доступа</a></li-->
                                <li class="{{ Request::is('admin/user*') ? 'active' : '' }}"><a href="/admin/user"><i class="fa fa-angle-double-right"></i> Пользователи</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        <small>Всё следует упрощать до тех пор, пока это возможно, но не более того.</small>
                    </h1>
                    @if(isset($name) && isset($action))
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> Главная</a></li>
                            @if($action == 'index')
                            <li class="active">{{ trans("name.$name" . 's') }}</li>
                            @else
                            <li><a href='{{ URL::to("admin/$name/category") }}'><i class="fa fa-newspaper-o"></i> {{ trans("name.$name.category" . 's') }}</a></li>
                            <li class="active">{{ trans("name.$action") }}</li>
                            @endif
                        </ol>
                    @endif
                </section>
                <section class="content">
                    @yield('content')
                </section>
            </aside>
        </div>
    </body>
</html>
<script type="text/javascript">
    $(function() {
        @if(Session::has('success'))
            bootbox.alert('{{ Session::get('success') }}');
            window.setTimeout(function(){
                bootbox.hideAll();
            }, 5000);
        @elseif(Session::has('error'))
            bootbox.alert('{{ Session::get('error') }}');
        @endif
    });
</script>