@extends('backend.master')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

@endpush

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- #END# Vertical Layout -->
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('author.post.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT Post

                            </h2>
                        </div>
                        <div class="body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
                                    <label class="form-label"> Post Title</label>
                                </div>
                            </div>
                            <div class=" form-group">

                                <b>Post Image</b><br>

                                <img src="{{ asset('backend/images/post/584').'/'.$post->image }}" style="height: 100px; width: auto"
                                    alt="" id="photo">
                                <input type="file" class="custom-file-input" accept="image/*" name="image" id="photo"
                                    onchange="showImage(this, 'photo')">

                            </div>

                            <div class=" form-group">
                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1" {{ $post->status==true ?'checked':'' }}>
                                <label for="publish">Publish</label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Categories and Tags

                            </h2>
                        </div>
                        <div class="body">

                            <div class="form-group form-float">
                                <div class="form-line @error('category') is-invalid @enderror ">
                                    <label for="category"> Select Category </label>
                                    <select name="categories" class="form-control show-tick" id="category"
                                        data-live-search="true">
                                        @foreach ($categories as $category)
                                        <option
                                         @foreach ($post->categories as $postCategory)
                                        {{$postCategory->id==$category->id ? 'selected' : ''}}
                                        @endforeach
                                         value="{{ $category->id}}"  >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line @error('tag') is-invalid @enderror ">
                                    <label for="category"> Select Tag </label>
                                    <select name="tags" class="form-control show-tick" id="tag" data-live-search="true">
                                        @foreach ($tags as $tag)
                                        <option
                                        @foreach ($post->tags as $postTag)
                                        {{$postTag->id==$tag->id ? 'selected' : ''}}
                                        @endforeach
                                         value="{{ $tag->id}}" >{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <a class="btn btn-danger m-t-15 waves-effect" href="{{route('author.post.index')}}">
                                <i class="material-icons">backspace</i>
                                <span>Back</span>
                            </a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                <i class="material-icons">save</i>
                                <span>Save</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Body

                            </h2>
                        </div>
                        <div class="body">
                            <textarea class="form-control @error('body') is-invalid @enderror" id="body"
                                name="body">{{ $post->body}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $post->id }}">
        </form>



    </div>
</section>
@endsection

@push('js')
<!-- Select Plugin Js -->

<script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- TinyMCE -->

<script src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'body', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
    });
</script>

<script>
    //Image Show Before Upload Start
  $(document).ready(function() {
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      if (fileName) {
        $('#fileLabel').html(fileName);
      }
    });
  });

  function showImage(data, imgId) {
    if (data.files && data.files[0]) {
      var obj = new FileReader();

      obj.onload = function(d) {
        var image = document.getElementById(imgId);
        image.src = d.target.result;
      }
      obj.readAsDataURL(data.files[0]);
    }
  }
  //Image Show Before Upload End

</script>

@endpush
