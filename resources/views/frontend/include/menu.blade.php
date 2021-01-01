<div class="menu-section section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="menu-section-wrap" >

                    <!-- Main Menu Start -->
                    <div class="main-menu float-left d-none d-md-block">
                        <nav>
                            <ul>
                                <li class=""><a href="{{ route('home.index') }}"><i class="fa fa-home fa-2x"></i></a>
                                </li>
                                @foreach ($categories as $item)
                                <li class="{{ Request::is('category/'.$item->slug) ? 'active' : '' }}"><a
                                        href="{{ route('home.category',$item->slug) }}"> {{ $item->name }}</a>
                                </li>
                                @endforeach


                            </ul>
                        </nav>
                    </div><!-- Main Menu Start -->

                    <div class="mobile-logo d-none d-block d-md-none"><a href="{{ route('home.index') }}"><img
                                src="{{ asset('/')}}frontend/img/logo-white.png" alt="Logo"></a></div>

                    <!-- Header Search -->
                    <div  class="header-search float-right">

                        <!-- Search Toggle -->
                        <button class="header-search-toggle"><i class="fa fa-search"></i></button>

                        <!-- Header Search Form -->
                        <div class="header-search-form">
                            <form action="#">
                                <input type="text" placeholder="এখানে অনুসন্ধান করুন">
                            </form>
                        </div>

                    </div>

                    <!-- Mobile Menu Wrap -->
                    <div class="mobile-menu-wrap d-none">
                        <nav>
                            <ul>
                                <li class=""><a href="{{ route('home.index') }}"><i class="fa fa-home fa-2x"></i></a>
                                </li>
                                @foreach ($categories as $item)
                                <li class="{{ Request::is('category/'.$item->slug) ? 'active' : '' }}"><a
                                        href="{{ route('home.category',$item->slug) }}">{{ $item->name }}</a>
                                </li>
                                @endforeach

                            </ul>
                        </nav>

                    </div>

                    <!-- Mobile Menu -->
                    <div class="mobile-menu"></div>

                </div>
            </div>
        </div>
    </div>
</div>
