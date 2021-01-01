<!-- Single Sidebar -->
<div class="single-sidebar col-lg-12 col-md-6 col-12">

    <!-- Sidebar Block Wrapper -->
    <div class="sidebar-block-wrapper">

        <!-- Sidebar Block Head Start -->
        <div class="head feature-head">

            <!-- Title -->
            <h4 class="title"> অনুসরণ করুন
            </h4>

        </div><!-- Sidebar Block Head End -->

        <!-- Sidebar Block Body Start -->
        <div class="body">

            <div class="sidebar-social-follow">
                @foreach ($follow as $item)
                <div>
                    <a href="#" class="bg-success">
                        <i class="{{ $item->icon }}"></i>

                    </a>
                </div>
                @endforeach


            </div>

        </div><!-- Sidebar Block Body End -->

    </div>

</div>
