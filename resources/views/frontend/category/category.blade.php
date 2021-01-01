@extends('frontend.master')
@section('content')

<!-- Popular Section Start -->
<div class="popular-section section bg-secondary pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col">

                <!-- Popular Post Slider Start -->
                <div class="popular-post-slider">

                    @foreach ($category_4 as $item)


                    <!-- Overlay Post Start -->
                    <div class="post post-overlay">
                        <div class="post-wrap">

                            <!-- Image -->
                            <div class="image"><img src="{{ asset('backend/images/post/371').'/'.$item->image }}"
                                    alt="post"></div>

                            <!-- Content -->
                            <div class="content">

                                <!-- Title -->
                                <h4 class="title"><a href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a>
                                </h4>

                                <!-- Meta -->
                                <div class="meta fix">
                                    <span class="meta-item date"><i
                                            class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                </div>

                            </div>

                        </div>
                    </div><!-- Overlay Post End -->
                    @endforeach


                </div><!-- Popular Post Slider End -->

            </div>
        </div>
    </div>
</div><!-- Popular Section End -->

<!-- Post Section Start -->
<div class="post-section section mt-50">
    <div class="container">

        <!-- Feature Post Row Start -->
        <div class="row">

            <div class="col-lg-8 col-12 mb-50">

                <!-- Post Block Wrapper Start -->
                <div class="post-block-wrapper">

                    <!-- Post Block Body Start -->
                    <div class="body">

                        @foreach ($category_all as $item)
                        <!-- Post Start -->
                        <div class="post fashion-post post-default-list post-separator-border">
                            <div class="post-wrap">

                                <!-- Image -->
                                <a class="image" href="{{route('home.details',$item->slug)}}"><img
                                        src="{{ asset('backend/images/post/270').'/'.$item->image }}" alt="post"></a>

                                <!-- Content -->
                                <div class="content">

                                    <!-- Title -->
                                    <h4 class="title"><a
                                            href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a></h4>

                                    <!-- Meta -->
                                    <div class="meta fix">
                                        <a href="" class="meta-item author"><i
                                                class="fa fa-user"></i>{{ $item->user->name }}</a>
                                        <span class="meta-item date"><i
                                                class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                    </div>

                                    <!-- Description -->
                                    <p>
                                        {!! Str::limit($item->body,170) !!}</p>

                                    <!-- Read More -->
                                    <a href="{{route('home.details',$item->slug)}}" class="read-more">বিস্তারিত</a>

                                </div>

                            </div>
                        </div><!-- Post End -->
                        @endforeach




                        <div class="page-pagination text-center">
                            <ul>
                                {{ $category_all->links() }}
                            </ul>
                        </div>

                    </div><!-- Post Block Body End -->

                </div><!-- Post Block Wrapper End -->

            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4 col-12 mb-50">
                <div class="row">


                    @include('frontend.include.follow')

                    @include('frontend.include.sidebar_add')

                    <!-- Single Sidebar -->
                    <div class="single-sidebar col-lg-12 col-md-6 col-12">

                        <div class="sidebar-subscribe">
                            <h4>সাবস্ক্রাইব করুন
                                <br>আমাদের <span>আপডেট</span> নিউজ</h4>
                            <p>আমাদের নতুন নতুন পোস্ট এর আপডেট পেতে রেজিস্ট্রেশন করুন!!!.</p>
                            <!-- Newsletter Form -->
                            @include('frontend.include.subscribe')
                        </div>

                    </div>
                    @include('frontend.include.sidebar_add')

                </div>
            </div><!-- Sidebar End -->

        </div><!-- Feature Post Row End -->

    </div>
</div><!-- Post Section End -->

@include('frontend.include.long_add')
@endsection
