<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a><img src="{{ asset('themes/admin/images/logo.png')  }}" alt=""></a>
    </div>

    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            @if(Auth::check())
            <li class="active"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> <span>{{ trans('ui.sidebar.dashboard') }}</span></a></li>

                <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>{{ trans('ui.sidebar.admin_users') }}</span></a>
                    <ul class="sub-menu-list">
                        @permission(['read-users', 'create-users', 'update-users', 'delete-users'])
                            <li><a href="{{ url('auth/user') }}"> <i class="fa fa-male"></i><span>{{ trans('ui.sidebar.users') }}</span></a></li>
                        @endpermission

                        @permission(['read-roles', 'create-roles', 'update-roles', 'delete-roles'])
                            <li><a href="{{ url('auth/role') }}"> <i class="fa fa-legal"></i><span>{{ trans('ui.sidebar.roles') }}</span></a></li>
                        @endpermission

                        @permission(['read-permissions', 'create-permissions', 'update-permissions', 'delete-permissions'])
                            <li><a href="{{ url('auth/permission') }}"><i class="fa fa-key"></i> <span>{{ trans('ui.sidebar.permissions') }}</span></a></li>
                        @endpermission
                    </ul>
                </li>
            @endif

        </ul>
        <!--sidebar nav end-->

    </div>
</div>