{{-- Sidebar --}}
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item ">
                <a href="{{route('home')}}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin.dashboard')}}</span>
                </a>
            </li>
            @can('settings')
            <li class=" nav-item">
                <a href="{{route('admin.settings.index')}}">
                    <i class="la la-gear"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">{{__('admin.settings')}}</span>
                </a>
            </li>
            @endcan
            @can('users')
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">{{__('admin.users')}}</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('admin.users.index')}}" data-i18n="nav.navbars.nav_light">{{__('admin.showAll')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.users.create')}}" data-i18n="nav.navbars.nav_light">{{__('admin.addUser')}}</a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('roles')
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-unlock"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">{{__('admin.roles')}}</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('admin.roles.index')}}" data-i18n="nav.navbars.nav_light">{{__('admin.showAll')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.roles.create')}}" data-i18n="nav.navbars.nav_light">{{__('admin.addRole')}}</a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('permissions')
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-lock"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">{{__('admin.permissions')}}</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('admin.permissions.index')}}" data-i18n="nav.navbars.nav_light">{{__('admin.showAll')}}</a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('categories')
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-tag"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">{{__('admin.categories')}}</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('admin.categories.index')}}" data-i18n="nav.navbars.nav_light">{{__('admin.showAll')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.categories.create')}}" data-i18n="nav.navbars.nav_light">{{__('admin.addCategory')}}</a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('news')
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-newspaper-o"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">{{__('admin.news')}}</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('admin.news.index')}}" data-i18n="nav.navbars.nav_light">{{__('admin.showAll')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.news.create')}}" data-i18n="nav.navbars.nav_light">{{__('admin.addNew')}}</a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('videos')
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-newspaper-o"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">{{__('admin.videos')}}</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('admin.videos.index')}}" data-i18n="nav.navbars.nav_light">{{__('admin.showAll')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.videos.create')}}" data-i18n="nav.navbars.nav_light">{{__('admin.addVideo')}}</a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('messages')
            <li class=" nav-item">
                <a href="#">
                    <i class="ficon ft-mail"></i>
                    <span class="menu-title" data-i18n="nav.navbars.main">{{__('admin.messages')}}</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('admin.messages.index')}}" data-i18n="nav.navbars.nav_light">{{__('admin.showAll')}}</a>
                    </li>
                </ul>
            </li>
            @endcan
        </ul>
    </div>
</div>
