<div class="footer-top-section section bg-dark">
    <div class="container-fluid">
        <div class="row">

            <!-- Footer Widget Start -->
            <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                <!-- Title -->
                <h4 class="widget-title">আমাদের সম্পর্কে</h4>

                <div class="content fix">
                    <p>{{ $setting->about }}</p>

                    <!-- Footer Contact -->
                    <ol class="footer-contact">
                        <li><i class="fa fa-home"></i>{{ $setting->address }}</li>
                        <li><i class="fa fa-envelope-open"></i>{{ $setting->email }}</li>
                        <li><i class="fa fa-headphones"></i>{{ $setting->phone }}</li>
                    </ol>

                    <!-- Footer Social -->
                    <div class="footer-social">
                    @foreach ($follow as $item)
                        <a href="#" class="bg-success"><i class="{{ $item->icon }}"></i></a>
                    @endforeach


                    </div>

                </div>

            </div><!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                <!-- Title -->
                <h4 class="widget-title">সর্বশেষ</h4>

                @foreach ($latest_footer as $item)


                <!-- Footer Widget Post Start -->
                <div class="footer-widget-post">
                    <div class="post-wrap">

                        <!-- Image -->
                        <a href="{{route('home.details',$item->slug)}}" class="image"><img
                                src="{{ asset('backend/images/post/124').'/'.$item->image }}" alt="Post"></a>

                        <!-- Content -->
                        <div class="content">

                            <!-- Title -->
                            <h5 class="title"><a href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a>
                            </h5>

                            <!-- Meta -->
                            <div class="meta fix">
                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                            </div>

                        </div>

                    </div>
                </div><!-- Footer Widget Post ENd -->

                @endforeach

            </div><!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                <!-- Title -->
                <h4 class="widget-title">শীর্ষ সংবাদ</h4>

                @foreach ($popular_posts_footer as $item)
                <!-- Footer Widget Post Start -->
                <div class="footer-widget-post">
                    <div class="post-wrap">

                        <!-- Image -->
                        <a href="{{route('home.details',$item->slug)}}" class="image"><img
                                src="{{ asset('backend/images/post/124').'/'.$item->image }}" alt="Post"></a>

                        <!-- Content -->
                        <div class="content">

                            <!-- Title -->
                            <h5 class="title"><a href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a>
                            </h5>

                            <!-- Meta -->
                            <div class="meta fix">
                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                            </div>

                        </div>

                    </div>
                </div><!-- Footer Widget Post ENd -->
                @endforeach



            </div><!-- Footer Widget End -->



            <div id="sub" class="footer-widget col-xl-3 col-md-6 col-12 mb-60">
                <!-- Title -->
                <h4 class="widget-title">সাবস্ক্রাইব</h4>
           <div class="sidebar-subscribe" style="background: rgb(19, 18, 18)">
            <h4 class="text-light">সাবস্ক্রাইব করুন
                <br>আমাদের <span>আপডেট</span> নিউজ</h4>
            <p>আমাদের নতুন নতুন পোস্ট এর আপডেট পেতে রেজিস্ট্রেশন করুন!!!.</p>
            <!-- Newsletter Form -->
          @include('frontend.include.subscribe')
        </div>

            </div>

        </div>
    </div>
</div>
<div class="footer-bottom-section section bg-dark">
    <div class="container">
        <div class="row">

            <!-- Copyright Start -->
            <div class="copyright text-center col">
                <p>কপিরাইট © {{ date('Y') }} সর্বস্বত্ব সংরক্ষিত | তৈরি করেন <span class="text-danger">&#10084;</span><span class="text-info"><a href="http://imzuyel.xyz/" target="blank">{{ $setting->copyright }}</a> </span> </p>
            </div><!-- Copyright End -->

        </div>
    </div>
</div>
