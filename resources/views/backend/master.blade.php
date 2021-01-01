<!DOCTYPE html>
<html>

    @include('backend.include.head')

    <body class="theme-cyan">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-cyan">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        @guest

        @else

        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        @include('backend.include.top_bar')
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            @include('backend.include.left_sidebar')
            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->
            @include('backend.include.right_sidebar')
            <!-- #END# Right Sidebar -->
        </section>
        @endguest
        @yield('content')
        @include('backend.include.js')

    </body>

</html>
