<div class="breaking-news-section section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <!-- Breaking News Wrapper Start -->
                <div class="breaking-news-wrapper">

                    <!-- Breaking News Title -->
                    <h5 class="breaking-news-title float-left">ব্রেকিং নিউজ</h5>

                    <!-- Breaking Newsticker Start -->
                    <ul class="breaking-news-ticker float-left">
                        @foreach ($posts as $item)
                        <li><a href="{{route('home.details',$item->slug)}}">{{ $item->title }}</a></li>
                        @endforeach


                    </ul><!-- Breaking Newsticker Start -->

                    <!-- Breaking News Nav -->
                    <div class="breaking-news-nav">
                        <button class="news-ticker-prev"><i class="fa fa-angle-left"></i></button>
                        <button class="news-ticker-next"><i class="fa fa-angle-right"></i></button>
                    </div>

                </div><!-- Breaking News Wrapper End -->

            </div>
        </div>
    </div>
</div>
