@extends('backend.master')
@section('title','Post Create')
@push('css')
<style>
    .label {
        color: white;
        padding: 8px;
    }

    .success {
        background-color: #4CAF50;
    }

    /* Green */
    .info {
        background-color: #2196F3;
    }

    /* Blue */
    .warning {
        background-color: #ff9800;
    }

    /* Orange */
    .danger {
        background-color: #f44336;
    }

    /* Red */
    .other {
        background-color: #e7e7e7;
        color: black;
    }

    /* Gray */
</style>
@endpush

@section('content')
<section class="content">
<div class="container-fluid">

    <!-- #END# Vertical Layout -->
    <!-- Vertical Layout | With Floating Label -->
    <a class="btn btn-danger waves-effect " href="{{route('admin.post.index')}}">
        <i class="material-icons">backspace</i>
        <span>Back</span>
    </a>
    @if ($post->is_approved==false)
    <a id="published"  href="{{ route('admin.post.approve',$post->id) }}" class="btn btn-success waves-effect pull-right">
        <i class="material-icons">done</i>
        <span>Approve</span></a>

    @else
    <button type="button" class="btn btn-success pull-right disabled"> <i class="material-icons">done</i>
        <span>Approved</span></button>
    @endif

    <br><br>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{$post->title}}
                        <small>Posted by <strong>
                                <a href="#">{{$post->user->name}}</a>
                            </strong> on {{$post->created_at}} </small>
                    </h2>
                </div>
                <div class="body">
                    {!! $post->body !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header info">
                    <h2>
                        Categories
                    </h2>
                </div>
                <div class="body">
                    @foreach ($post->categories as $category)
                    <span class="label info">{{$category->name}}</span>
                    @endforeach
                </div>
            </div>

            <div class="card">
                <div class="header success">
                    <h2>
                        Tags
                    </h2>
                </div>
                <div class="body">
                    @foreach ($post->tags as $tag)
                    <span class="label success">{{$tag->name}}</span>

                    @endforeach
                </div>
            </div>

            <div class="card">
                <div class="header bg-cyan">
                    <h2>
                        Featured Image
                    </h2>
                </div>
                <div class="body">
                    <img class="img-responsive thumbnail"
                        src="{{ asset('backend/images/post/584').'/'.$post->image }}" alt="Post">
                </div>
            </div>
        </div>

    </div>

</div>
</section>
@endsection

@push('js')
<!-- Select Plugin Js -->

<script src="{{asset('public/assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- TinyMCE -->
<script src="{{asset('public/assets/backend/plugins/tinymce/tinymce.js')}}"></script>


<script>
    $(function () {


    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save blockquote table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | blockquote | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons blockquote',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = "{{asset('public/assets/backend/plugins/tinymce')}} ";
});

</script>

<script type="text/javascript">
    function approvePost(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to Approved this post!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
        if (result.value) {
                event.preventDefault();
                document.getElementById('approve-form').submit();
        }
        })
    }
</script>


@endpush
