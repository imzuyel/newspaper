@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush
@extends('backend.master')
@section('title') Posts @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <div class="block-header">
            <a class=" btn btn-primary waves-effect" href="{{ route('author.post.create')}}"> <i
                    class="material-icons">add</i>
                <span>Add New Post</span>
            </a>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Post
                            <span class=" badge bg-blue">{{ $posts->count()}}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>
                                            <i class="material-icons">visibility</i>
                                        </th>
                                        <th>Is Approve</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>
                                            <i class="material-icons">visibility</i>
                                        </th>
                                        <th>Is Approve</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($posts as $key=>$post)
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        <td>{{ Str::limit($post->title,'15')}}</td>
                                        <td>{{ $post->user->name}}</td>
                                        <td>{{ $post->view_count}}</td>
                                        <td>
                                            @if ($post->is_approved==true)
                                            <span class="badge bg-blue">Approved</span>
                                            @else
                                            <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($post->status==true)
                                            <span class="badge bg-blue">published</span>
                                            @else
                                            <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at}}</td>

                                        <td class="text-center">
                                            <a class=" btn btn-info waves-effect"
                                                href="{{ route('author.post.show',$post->id) }}">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a class=" btn btn-info waves-effect"
                                                href="{{ route('author.post.edit',$post->id) }}">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a id="delete" class=" btn btn-danger waves-effect"
                                                href="{{ route('author.post.delete',$post->id) }}">
                                                <i class="material-icons">delete</i>
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

@endsection
@push('js')


{{-- Update Service  --}}
<script>
    $('#editPost').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #id').val(id)
  })
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
</script>
@endpush
