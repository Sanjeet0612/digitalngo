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
                <a  href="{{route('admin.dashboard')}}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

             <li class="dropdown">
                <a  href="javascript:void(0)">
                    <iconify-icon icon="mdi:office-building" class="menu-icon"></iconify-icon>
                    <span>Home</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('admin.manage_contact')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Manage Contact</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.manage_banner')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Manage Banner</a>
                    </li>
                </ul>    
            </li>

            <li class="dropdown">
                    <a  href="javascript:void(0)">
                        <iconify-icon icon="fluent:calendar-24-regular" class="event-icon menu-icon"></iconify-icon>
                        <span>Event</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a  href="{{route('admin.manage_sponsor')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Manage Sponsor</a>
                        </li>
                        <li>
                            <a  href="{{route('admin.manage_event')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Manage Event</a>
                        </li>
                        <li>
                            <a  href="{{route('admin.manage_event_gallery')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Manage Event Gallery</a>
                        </li>
                    </ul>
            </li>  
            
            <li class="dropdown">
                    <a  href="javascript:void(0)">
                        <iconify-icon icon="fluent:people-team-24-regular" class="event-icon menu-icon"></iconify-icon>
                        <span>Team</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a  href="{{route('admin.management_team')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Management Team</a>
                        </li>
                        <li>
                            <a  href="{{route('admin.governing_board_teams')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Governing Board Teams</a>
                        </li>
                        
                        <li>
                            <a  href="{{route('admin.volunteers_team')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Volunteers Team</a>
                        </li>

                        <li>
                            <a  href="{{route('admin.all_team')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>All Team</a>
                        </li>
                       
                    </ul>
            </li>
            
            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <iconify-icon icon="fluent:people-team-24-regular" class="event-icon menu-icon"></iconify-icon>
                    <span>Gallery</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('admin.picture_category')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Picture Category</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.gallery_picture')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Picture</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.gallery_video')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Video</a>
                    </li>
                </ul>
            </li>
            
            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-6 d-flex w-auto"></i>
                    <span>Blog / Articles</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('admin.manage_articles')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>All Blog</a>
                    </li>
                    <li>
                        <a  href="{{route('admin.add_articles')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Add Blog</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-6 d-flex w-auto"></i>
                    <span> Key Features</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('admin.key_features')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>All  Key Features</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-6 d-flex w-auto"></i>
                    <span> Our Partner</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{route('admin.our_partners')}}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>All  Partners</a>
                    </li>
                </ul>
            </li>

           
		</ul>
    </div>
</aside>