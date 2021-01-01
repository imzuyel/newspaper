<!-- Header Top Start -->
<div class="header-top section" >
    <div class="container">
        <div class="row">

            <!-- Header Top Links Start -->
            <div class="header-top-links col-md-12 col-12">

                <!-- Header Links -->
                <ul class="header-links">
                    <li class="bg-info p-2 mydate"><a href="#" class="date"><i class="fa fa-clock-o"></i>
                           {{$mydate->getDateTime()->format('l jS F Y  ') }}</a></li>
                    @foreach($follow as $item)
                    <li class="p-2"><a href="#sub" ><i class="{{ $item->icon }}"></i></a></li>
                    @endforeach
                </ul>

            </div><!-- Header Top Links End -->



        </div>
    </div>
</div><!-- Header Top End -->

<!-- Header Start -->
<div class="header-section section">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo -->
            <div class="header-logo col-md-4 d-none d-md-block">
                <a href="#" class="logo"><img src="{{ asset('/').$setting->image}}" alt="Logo"></a>
            </div>
           @include('frontend.include.long_add')

        </div>
    </div>
</div><!-- Header End -->
