@extends('frontend.master')
@section('content')
<!-- Hero Section Start -->
<div class="hero-section section mt-30 mb-30">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row row-1">

                    <div class="order-lg-2 col-lg-6 col-12">
                        <!-- Hero Post Slider Start -->
                        <div class="post-carousel-1">

                            @foreach ($post1 as $item)
                            <!-- Overlay Post Start -->
                            <div class="post post-large post-overlay hero-post">
                                <div class="post-wrap">

                                    <!-- Image -->
                                    <div class="image"><img
                                            src="{{ asset('backend/images/post/584').'/'.$item->image }}" alt="post">
                                    </div>

                                    <!-- Category -->
                                    @foreach ($item->categories as $category)
                                    <a href="{{ route('home.category',$category->slug) }}" class="category politic">
                                        {{$category->name}}
                                    </a>
                                    @endforeach
                                    <!-- Content -->
                                    <div class="content">
                                        <!-- Title -->
                                        <h2 class="title"><a
                                                href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a></h2>

                                        <!-- Meta -->
                                        <div class="meta fix">
                                            <span class="meta-item date "><i
                                                    class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- Overlay Post End -->
                            @endforeach
                        </div><!-- Hero Post Slider End -->
                    </div>
                    <div class="order-lg-1 col-lg-3 col-12">
                        <div class="row row-1">
                            @foreach ($post2 as $key=>$item)
                            <!-- Overlay Post Start -->
                            <div class="post post-overlay hero-post col-lg-12 col-md-6 col-12">
                                <div class="post-wrap">

                                    <!-- Image -->
                                    <div class="image"><img
                                            src="{{ asset('backend/images/post/270').'/'.$item->image }}" alt="post">
                                    </div>
                                    <!-- Category -->
                                    @foreach ($item->categories as $category)
                                    <a href="{{ route('home.category',$category->slug) }}"
                                        class="category travel {{ $key==0 ?'bg-info' : '' }}">
                                        {{$category->name}}
                                    </a>
                                    @endforeach
                                    <!-- Content -->
                                    <div class="content">
                                        <!-- Title -->
                                        <h4 class="title"><a
                                                href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a></h4>
                                        <!-- Meta -->
                                        <div class="meta fix">
                                            <span class="meta-item date"><i
                                                    class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Overlay Post End -->
                            @endforeach
                        </div>
                    </div>
                    <div class="order-lg-3 col-lg-3 col-12">
                        <div class="row row-1">

                            @foreach ($post3 as $key=>$item)
                            <!-- Overlay Post Start -->
                            <div class="post post-overlay gradient-overlay-1 col-lg-12 col-md-6 col-12">
                                <div class="post-wrap">

                                    <!-- Image -->
                                    <div class="image"><img
                                            src="{{ asset('backend/images/post/270').'/'.$item->image }}" alt="post">
                                    </div>
                                    <!-- Category -->
                                    @foreach ($item->categories as $category)
                                    <a href="{{ route('home.category',$category->slug) }}"
                                        class="category travel {{ $key==0 ?'bg-success' : 'bg-primary' }}">
                                        {{$category->name}}
                                    </a>
                                    @endforeach
                                    <!-- Content -->
                                    <div class="content">
                                        <!-- Title -->
                                        <h4 class="title"><a
                                                href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a></h4>

                                        <!-- Meta -->
                                        <div class="meta fix">
                                            <span class="meta-item date"><i
                                                    class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Overlay Post End -->
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Section End -->

<!-- Popular Section Start -->
<div class="popular-section section pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Popular Post Slider Start -->
                <div class="popular-post-slider">
                    @foreach ($post4 as $item)
                    <!-- Post Start -->
                    <div class="post post-small post-list post-dark popular-post">
                        <div class="post-wrap">
                            <!-- Image -->
                            <a class="image" href="{{route('home.details',$item->slug)}}"><img
                                    src="{{ asset('backend/images/post/125').'/'.$item->image }}" alt="post"></a>
                            <!-- Content -->
                            <div class="content fix">
                                <!-- Title -->
                                <h5 class="title"><a href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a>
                                </h5 <!-- Description -->
                                {{--  <p>{!! Str::limit($item->body,30) !!}</p>  --}}

                                <!-- Read More -->
                                <a href="{{route('home.details',$item->slug)}}" class="read-more">বিস্তারিত</a>
                            </div>
                        </div>
                    </div><!-- Post Start -->
                    @endforeach
                </div><!-- Popular Post Slider End -->

            </div>
        </div>
    </div>
</div>
<!-- Popular Section End -->

<!-- Post Section Start -->
<div class="post-section section mt-50">
    <div class="container">
        <!-- Feature Post Row Start -->
        <div class="row">
            <!-- Category wise post -->
            <div class="col-lg-8 col-12 mb-50">

                <!-- Post Block Wrapper Start -->
                @foreach ($categories1 as $i=>$item)
                <div class="post-block-wrapper">

                    <!-- Post Block Head Start -->
                    <div class="head feature-head">
                        <!-- Title -->
                        <h4 class="title {{ $loop->iteration % 2 == 0?'text-danger':'' }}">{{ $item->name }}</h4>

                    </div><!-- Post Block Head End -->

                    <!-- Post Block Body Start -->
                    <div class="body pb-0">

                        <!-- Tab Content Start-->
                        <div class="tab-content">

                            <!-- Tab Pane Start-->
                            <div class="tab-pane fade show active" id="feature-cat-1">

                                <div class="row">

                                    <!-- Post Wrapper Start -->



                                    <div class="col-md-6 col-12 mb-20">
                                        <!-- Post Start -->
                                        @foreach ($item->posts->take(1)->where('is_approved', 1)->where('status', 1) as
                                        $key=>$post)

                                        <div class="post feature-post post-separator-border">
                                            <div class="post-wrap">

                                                <!-- Image -->
                                                <a class="image" href="{{route('home.details',$post->slug)}}"><img
                                                        src="{{ asset('backend/images/post/371').'/'.$post->image }}"
                                                        alt="post"></a>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h4 class="title"><a
                                                            href="{{route('home.details',$post->slug)}}">{{ $post->title }}</a>
                                                    </h4>

                                                    <!-- Meta -->
                                                    <div class="meta fix">
                                                        <a href="#" class="meta-item author"><i
                                                                class="fa fa-user"></i>Sathi Bhuiyan</a>
                                                        <span class="meta-item date"><i
                                                                class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                                        <a class="meta-item comment"><i
                                                                class="fa fa-eye"></i>({{ $post->view_count }})</a>

                                                    </div>

                                                    <!-- Description -->
                                                    <p>{!! Str::limit($post->body,100) !!}</p>

                                                </div>

                                            </div>
                                        </div>

                                        @endforeach
                                        <!-- Post End -->
                                    </div>
                                    <!-- Post Wrapper End -->

                                    <!-- Small Post Wrapper Start -->
                                    <div class="col-md-6 col-12 mb-20">
                                        <!-- Post Small Start -->

                                        @foreach ($item->posts->skip(1)->take(3)->where('is_approved',
                                        1)->where('status', 1) as $keys=>$post)


                                        <div class="post post-small post-list feature-post post-separator-border">
                                            <div class="post-wrap">
                                                <!-- Image -->
                                                <a class="image" href="{{route('home.details',$post->slug)}}"><img
                                                        src="{{ asset('backend/images/post/124').'/'.$post->image }}"
                                                        alt="post"></a>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h5 class="title"><a
                                                            href="{{route('home.details',$post->slug)}}">{{ $post->title }}
                                                    </h5></a>

                                                    <!-- Meta -->
                                                    <div class="meta fix">
                                                        <span class="meta-item date"><i
                                                                class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @endforeach

                                        <!-- Post Small End -->
                                    </div>

                                    <!-- Small Post Wrapper End -->

                                </div>

                            </div><!-- Tab Pane End-->


                        </div><!-- Tab Content End-->

                    </div><!-- Post Block Body End -->

                </div><!-- Post Block Wrapper End -->
                @endforeach
            </div>
            <!--End Category wise post -->
            <!-- Sidebar Start -->
            <div class="col-lg-4 col-12 mb-50">
                <div class="row">

                    <!-- Single Sidebar -->
                    @include('frontend.include.follow')
                    @include('frontend.include.sidebar_add')
                    @include('frontend.include.latest')
                    @include('frontend.include.sidebar_add')

                </div>
            </div>
            <!-- Sidebar End -->
        </div>
        <!-- Feature Post Row End -->
        <!-- Category wise post -->
        <div class="row">
            @foreach ($categories2 as $item)
            <div class="col-lg-4 col-md-6 col-12 mb-50">
                <!-- Post Block Wrapper Start -->
                <div class="post-block-wrapper">

                    <!-- Post Block Head Start -->
                    <div class="head education-head">

                        <!-- Title -->
                        <h4 class="title">{{ $item->name }}</h4>

                    </div><!-- Post Block Head End -->

                    <!-- Post Block Body Start -->
                    <div class="body">

                        <!-- Sidebar Post Slider Start -->
                        <div
                            class="four-row-post-carousel row-post-carousel post-block-carousel education-post-carousel">

                            <!-- Small Post Start -->
                            @foreach ($item->posts->sortbydesc('id')->where('is_approved', 1)->where('status', 1) as
                            $key=>$post)
                            <div class="post post-small post-list education-post">
                                <div class="post-wrap">

                                    <!-- Image -->
                                    <a class="image" href="{{route('home.details',$post->slug)}}"><img
                                            src="{{ asset('backend/images/post/124').'/'.$post->image }}"
                                            alt="post"></a>

                                    <!-- Content -->
                                    <div class="content">

                                        <!-- Title -->
                                        <h5 class="title"><a
                                                href="{{route('home.details',$post->slug)}}">{{ $post->title }}</a></h5>

                                        <!-- Meta -->
                                        <div class="meta fix">
                                            <span class="meta-item date"><i
                                                    class="fa fa-clock-o"></i>{{ $post->updated_at->diffForHumans()}}</span>
                                        </div>

                                    </div>

                                </div>
                            </div><!-- Small Post End -->
                            @endforeach



                        </div>
                        <!-- Sidebar Post Slider End -->

                    </div><!-- Post Block Body End -->

                </div><!-- Post Block Wrapper End -->
            </div>
            @endforeach
        </div>
        <!-- Category wise post End -->
        <!-- Category wise post -->
        <div class="row">
            @foreach ($categories3 as $item)
            <div class="col-lg-4 col-md-6 col-12 mb-50">

                <!-- Post Block Wrapper Start -->
                <div class="post-block-wrapper">

                    <!-- Post Block Head Start -->
                    <div class="head fashion-head">

                        <!-- Title -->
                        <h4 class="title">{{ $item->name }}</h4>

                    </div><!-- Post Block Head End -->

                    <!-- Post Block Body Start -->
                    <div class="body">

                        <!-- Sidebar Post Slider Start -->
                        <div class="sidebar-post-carousel post-block-carousel fashion-post-carousel">

                            <!-- Post Start -->
                            @foreach ($item->posts->sortbydesc('id')->take(8)->where('is_approved', 1)->where('status',
                            1) as $key=>$post)
                            <div class="post fashion-post">
                                <div class="post-wrap">

                                    <!-- Image -->
                                    <a class="image" href="{{route('home.details',$post->slug)}}"><img
                                            src="{{ asset('backend/images/post/371').'/'.$post->image }}"
                                            alt="post"></a>

                                    <!-- Content -->
                                    <div class="content">

                                        <!-- Title -->
                                        <h4 class="title"><a
                                                href="{{route('home.details',$post->slug)}}">{{ $post->title }}</a></h4>

                                    </div>

                                </div>
                            </div><!-- Post End -->
                            @endforeach

                        </div><!-- Sidebar Post Slider End -->

                    </div><!-- Post Block Body End -->

                </div><!-- Post Block Wrapper End -->

            </div>
            @endforeach

        </div>
        <!-- Category wise post end -->
    </div>
</div>
<!-- Post Section End -->

@include('frontend.include.long_add')
@endsection
