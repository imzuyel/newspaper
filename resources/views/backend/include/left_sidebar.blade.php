<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('/').Auth::user()->image }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
            </div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="material-icons">input</i>Sign Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>

            @if (Request::is('admin*'))
            <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                <a href="{{route('admin.index')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{Request::is('admin/tag*') ? 'active' : ''}}">
                <a href="{{route('admin.tag.index')}}">
                    <i class="material-icons">label</i>
                    <span>Tag</span>
                </a>
            </li>
            <li class="{{Request::is('admin/category*') ? 'active' : ''}}">
                <a href="{{route('admin.category.index')}}">
                    <i class="material-icons">apps</i>
                    <span>Category</span>
                </a>
            </li>
            <li class="{{Request::is('admin/post*') ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">pages</i>
                    <span>Post</span>
                </a>
                <ul class="ml-menu">

                    <li
                        class="{{Request::is('admin/post') ? 'active' : ''}} {{Request::is('admin/post/edit*') ? 'active' : ''}} {{Request::is('admin/post/show*') ? 'active' : ''}}">
                        <a href="{{ route('admin.post.index') }}">All Post</a>
                    </li>
                    <li class="{{Request::is('admin/post/create') ? 'active' : ''}}">
                        <a href="{{ route('admin.post.create') }}">Add Post</a>
                    </li>
                </ul>
            </li>

            <li class="{{Request::is('admin/approve/posts/pending*') ? 'active' : ''}}">
                <a href="{{route('admin.post.pending')}}">
                    <i class="material-icons">assignment_returned</i>
                    <span>Pending Posts</span>
                </a>
            </li>
            <li class="{{Request::is('admin/subscriber*') ? 'active' : ''}}">
                <a href="{{route('admin.subscriber.index')}}">
                    <i class="material-icons">video_library</i>
                    <span>Suscriber</span>
                </a>
            </li>
            <li class="{{Request::is('admin/flow*') ? 'active' : ''}}">
                <a href="{{route('admin.flow')}}">
                    <i class="material-icons">group_add</i>
                    <span>Follow</span>
                </a>
            </li>

            <li class="{{Request::is('admin/add*') ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">language</i>
                    <span>Ads</span>
                </a>

                <ul class="ml-menu">

                    <li class="{{Request::is('admin/add/tall*') ? 'active' : ''}}">
                        <a href="{{ route('admin.add1') }}">Tall Ads</a>
                    </li>
                    <li class="{{Request::is('admin/add/sidebar*') ? 'active' : ''}}">
                        <a href="{{ route('admin.add2') }}">Sidebar Ads</a>
                    </li>
                </ul>
            </li>
            <li class="{{Request::is('admin/setting/website') ? 'active' : ''}}">
                <a href="{{ route('admin.website') }}">
                    <i class="material-icons">edit</i>
                    <span>WebSite Setting</span>
                </a>
            </li>
            <li class="{{Request::is('admin/settings*') ? 'active' : ''}}">
                <a href="{{route('admin.settings')}}">
                    <i class="material-icons">vpn_key</i>
                    <span>Security</span>
                </a>
            </li>
            @endif

            @if (Request::is('author*'))
            <li class="{{Request::is('author/dashboard') ? 'active' : ''}}">
                <a href="{{route('author.index')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{Request::is('author/post*') ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">library_books</i>
                    <span>Post</span>
                </a>

                <ul class="ml-menu">

                    <li
                        class="{{Request::is('author/post') ? 'active' : ''}} {{Request::is('author/post/edit*') ? 'active' : ''}} {{Request::is('author/post/show*') ? 'active' : ''}}">
                        <a href="{{ route('author.post.index') }}">All Post</a>
                    </li>
                    <li class="{{Request::is('author/post/create') ? 'active' : ''}}">
                        <a href="{{ route('author.post.create') }}">Add Post</a>
                    </li>
                </ul>
            </li>
            <li class="{{Request::is('author/settings*') ? 'active' : ''}}">
                <a href="{{route('author.settings')}}">
                    <i class="material-icons">settings</i>
                    <span>Settings</span>
                </a>
            </li>
            @endif




            <li class="header">LABELS</li>


            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();"><i
                        class="material-icons">input</i> <span>Sign Out</span> </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 <a href="javascript:void(0);">Zuyel - Rana Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
