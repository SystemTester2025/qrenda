<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper">
                <a href="{{ getDashboardURL() }}">
                    <img class="img-fluid" src="{{ getDashboardLogoUrl() ?: getAppLogo() }}" alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="dark-logo-wrapper">
                <a href="{{ getDashboardURL() }}">
                    <img class="img-fluid" src="{{ getDashboardLogoUrl() ?: getAppLogo() }}" alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="toggle-sidebar" onclick="$('.main-nav').toggleClass('close_icon'); $('.page-main-header').toggleClass('close_icon');">
                <i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i>
            </div>
        </div>
        
        <div class="left-menu-header col">
            <ul>
                <li>
                    <form class="form-inline search-form">
                        <div class="search-bg">
                            <i class="fa fa-search"></i>
                            <input class="form-control-plaintext" placeholder="Search here.....">
                        </div>
                    </form>
                    <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                </li>
            </ul>
        </div>
        
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li>
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                        <i data-feather="maximize"></i>
                    </a>
                </li>
                
                <li>
                    <div class="mode">
                        <a href="{{ route('mode.theme') }}" class="text-dark">
                            <i class="fa {{ getLogInUser()->theme_mode ? 'fa-sun' : 'fa-moon-o' }}"></i>
                        </a>
                    </div>
                </li>

                <li>
                    <a class="text-dark" href="javascript:void(0)" onclick="$('#changeLanguageModal').modal('show')">
                        <i data-feather="globe"></i>
                    </a>
                </li>
                
                <li class="onhover-dropdown p-0">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary-light">
                            <i data-feather="log-out"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        
        <div class="d-lg-none mobile-toggle pull-right w-auto">
            <i data-feather="more-horizontal"></i>
        </div>
    </div>
</div>