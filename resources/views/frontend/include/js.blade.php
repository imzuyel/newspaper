<!-- jQuery JS -->
<script src="{{ asset('/')}}frontend/js/vendor/jquery-1.12.0.min.js"></script>
<!-- Popper JS -->
<script src="{{ asset('/')}}frontend/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('/')}}frontend/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="{{ asset('/')}}frontend/js/plugins.js"></script>
<!-- rypp JS -->
<script src="{{ asset('/')}}frontend/js/rypp.js"></script>
<script src="{{ asset('/')}}frontend/js/ytp-playlist.js"></script>
<!-- Ajax Mail JS -->
<script src="{{ asset('/')}}frontend/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="{{ asset('/')}}frontend/js/main.js"></script>

<!-- Toaster-->
<script src="{{ asset('js/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
        @endif
</script>

{{--  Share  --}}
<script type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property=5fb7c58d8c464300124c239e&product=inline-follow-buttons"
    async="async"></script>

<script>
        $(document).on("scroll", function(){
            if
            ($(document).scrollTop() > 86){
            $("#banner").addClass("shrink");
            }
            else
            {
            $("#banner").removeClass("shrink");
            }
            });
</script>
