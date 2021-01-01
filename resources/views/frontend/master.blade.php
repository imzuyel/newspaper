<!doctype html>
<html class="no-js" lang="en">

    <!-- Head  Start -->
    @include('frontend.include.head')
    <!-- Head End -->

    <body>
     <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=119419946496295&autoLogAppEvents=1"
        nonce="vBuFttKJ"></script>

        <!-- Main Wrapper -->
        <div id="main-wrapper">

            <!-- Header Top Start -->
            @include('frontend.include.header')
            <!-- Header End -->

            <!-- Menu Section Start -->
            @include('frontend.include.menu')
            <!-- Menu Section End -->

            <!-- Breaking News Section Start -->
            @include('frontend.include.breaking')
            <!-- Breaking News Section End -->

            @yield('content')

            <!-- Footer Top Section Start -->
            @include('frontend.include.footer')
            <!-- Footer Top Section End -->


        </div>


        <!-- Js-->
        @include('frontend.include.js')
        <!--End Js-->

    </body>
</html>
