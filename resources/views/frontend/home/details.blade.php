@extends('frontend.master')
@section('content')


<!-- Blog Section Start -->
<div class="blog-section section">
    <div class="container">

        <!-- Feature Post Row Start -->
        <div class="row">

            <div class="col-lg-8 col-12 mb-50">

                <!-- Single Blog Start -->
                <div class="single-blog mb-50">
                    <div class="blog-wrap">


                        <!-- Title -->
                        <h3 class="title">{{ $post->title }}</h3>

                        <!-- Image -->
                        <div class="image"><img src="{{ asset('backend/images/post/584').'/'.$post->image }}"
                                alt="post"></div>
                        <!-- Meta -->
                        <div class="meta fix">
                            @foreach ($post->categories as $category)
                            <a href="{{ route('home.category',$category->slug) }}" class="meta-item category fashion">
                                {{ $category->name }}
                                @endforeach</a>
                            <a href="" class="meta-item author"><img src="{{ asset('').$post->user->image }}"
                                    alt="post author">{{ $post->user->name }}</a>
                            <span class="meta-item date"><i
                                    class="fa fa-clock-o"></i>{{ $post->updated_at->diffForHumans()}}</span>
                            {{--  <a href="#" class="meta-item comments"><i class="fa fa-comments"></i>(38)</a>  --}}
                            <span class="meta-item view"><i class="fa fa-eye"></i>({{ $post->view_count }})</span>
                        </div>

                        <!-- Content -->
                        <div class="content">

                            <!-- Description -->
                            <p>{!! $post->body !!}
                            </p>


                        </div>

                        <div class="tags-social float-left">

                            <div class="tags float-left">
                                <i class="fa fa-tags"></i>
                                @foreach ($post->categories as $category)
                                <a href="{{ route('home.category',$category->slug) }}">{{ $category->name }}</a>
                                @endforeach


                            </div>

                            <div class="blog-social float-right">
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>

                        </div>

                    </div>
                </div><!-- Single Blog End -->

                <!-- Previous & Next Post Start -->
                <div class="post-nav mb-50">
                    @if(isset($previous_record))
                    <a href="{{ route('home.details',$previous_record->slug) }}" class="prev-post"><span>পূর্ববর্তী
                            খবর</span>{{ $previous_record->title }}</a>
                    @endif
                    @if(isset($next_record))
                    <a href="{{ route('home.details',$next_record->slug) }}" class="next-post"><span>পরবর্তী
                            খবর</span>{{ $next_record->title }}</a>
                    @endif
                </div><!-- Previous & Next Post End -->

                <!-- Post Author Start -->
                <div class="post-author fix mb-50">

                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-colorscheme="light"
                        data-numposts="5" data-width=""></div>

                </div><!-- Post Author End -->

                <!-- Post Block Wrapper Start -->
                <div class="post-block-wrapper mb-50">

                    <!-- Post Block Head Start -->
                    <div class="head">

                        <!-- Title -->
                        <h4 class="title">আরও খবর!</h4>

                    </div><!-- Post Block Head End -->

                    <!-- Post Block Body Start -->
                    <div class="body">

                        <div class="two-column-post-carousel column-post-carousel post-block-carousel row">
                            @foreach ($latest as $item)
                            <div class="col-md-6 col-12">


                                <!-- Overlay Post Start -->
                                <div class="post post-overlay hero-post">
                                    <div class="post-wrap">

                                        <!-- Image -->
                                        <div class="image"><img
                                                src="{{ asset('backend/images/post/371').'/'.$item->image }}"
                                                alt="post">
                                        </div>


                                        <!-- Category -->
                                        @foreach ($item->categories as $category)
                                        <a href="{{ route('home.category',$category->slug) }}"
                                            class="category gadgets {{ $loop->parent->iteration % 2 == 0?'bg-success':'bg-danger' }}">{{ $category->name }}</a>
                                        @endforeach

                                        <!-- Content -->
                                        <div class="content">

                                            <!-- Title -->
                                            <h4 class="title"><a href="post-details.html">{{ $item->title }}</a></h4>

                                            <!-- Meta -->
                                            <div class="meta fix">
                                                <span class="meta-item date"><i
                                                        class="fa fa-clock-o"></i>{{ $item->updated_at->diffForHumans()}}</span>
                                            </div>

                                        </div>

                                    </div>
                                </div><!-- Overlay Post End -->

                            </div>

                            @endforeach

                        </div>

                    </div><!-- Post Block Body End -->

                </div><!-- Post Block Wrapper End -->



            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4 col-12 mb-50">
                <div class="row">

                  @include('frontend.include.follow')
                    <!-- Single Sidebar -->
                   @include('frontend.include.sidebar_add')
                   @include('frontend.include.latest')
                   @include('frontend.include.sidebar_add')

                </div>
            </div><!-- Sidebar End -->

        </div><!-- Feature Post Row End -->

    </div>
</div><!-- Blog Section End -->

@include('frontend.include.long_add')
@endsection
