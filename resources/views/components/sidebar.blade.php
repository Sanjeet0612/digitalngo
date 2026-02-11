<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('index') }}" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a  href="{{url('/')}}/dashboard">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
                
            </li>
           
            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('new_user')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Refrer Users</a>
                    </li>
                </ul>    
               
            </li>

            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-6 d-flex w-auto"></i>
                    <span>Function & Features</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{ route('all_fearure') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>All Features</a>
                    </li>
                    
                </ul>
            </li>


        </ul>
    </div>
</aside>