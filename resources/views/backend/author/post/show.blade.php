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
        <a class="btn btn-danger waves-effect " href="{{route('author.post.index')}}">
            <i class="material-icons">backspace</i>
            <span>Back</span>
        </a>
        @if ($post->is_approved==false)
        <button type="submit" class="btn btn-success waves-effect pull-right" onclick="approvePost({{$post->id}})">
            <i class="material-icons">done</i>
            <span>Approve</span></button>


        <form id="approve-form" style=" display: none;" method="POST" action="">
            @csrf
            @method('PUT')
        </form>
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




@endpush
