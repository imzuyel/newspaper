<div class="single-sidebar col-lg-12 col-md-6 col-12">

    <!-- Sidebar Block Wrapper -->
    <div class="sidebar-block-wrapper">

        <!-- Sidebar Block Head Start -->
        <div class="head education-head">

            <!-- Tab List -->
            <div class="sidebar-tab-list education-sidebar-tab-list nav">
                <a class="active" data-toggle="tab" href="#latest-news">সদ্যপ্রাপ্ত সংবাদ</a>
                <a data-toggle="tab" href="#popular-news">জনপ্রিয় সংবাদ</a>
            </div>

        </div><!-- Sidebar Block Head End -->

        <!-- Sidebar Block Body Start -->
        <div class="body">

            <div class="tab-content">
                <div class="tab-pane fade show active" id="latest-news">
                    @foreach ($latest as $item)
                    <!-- Small Post Start -->
                    <div class="post post-small post-list education-post post-separator-border">
                        <div class="post-wrap">

                            <!-- Image -->
                            <a class="image" href="{{route('home.details',$item->slug)}}"><img
                                    src="{{ asset('backend/images/post/124').'/'.$item->image }}" alt="post"></a>

                            <!-- Content -->
                            <div class="content">

                                <!-- Title -->
                                <h5 class="title"><a href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a>
                                </h5>

                                <!-- Meta -->
                                <div class="meta fix">
                                    <span class="meta-item date"><i
                                            class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                </div>

                            </div>

                        </div>
                    </div><!-- Small Post End -->
                    @endforeach

                </div>
                <div class="tab-pane fade" id="popular-news">

                    @foreach ($popular_posts as $item)
                    <!-- Small Post Start -->
                    <div class="post post-small post-list education-post post-separator-border">
                        <div class="post-wrap">

                            <!-- Image -->
                            <a class="image" href="{{route('home.details',$item->slug)}}"><img
                                    src="{{ asset('backend/images/post/124').'/'.$item->image }}" alt="post"></a>

                            <!-- Content -->
                            <div class="content">

                                <!-- Title -->
                                <h5 class="title"><a href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a>
                                </h5>

                                <!-- Meta -->
                                <div class="meta fix">
                                    <span class="meta-item date"><i
                                            class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                </div>

                            </div>

                        </div>
                    </div><!-- Small Post End -->
                    @endforeach




                </div>
            </div>

        </div><!-- Sidebar Block Body End -->

    </div>

</div>
