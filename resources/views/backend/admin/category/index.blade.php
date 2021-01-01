@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
@endpush
@extends('backend.master')
@section('title') Category @endsection
@section('content')
<section class="content">

  <div class="container-fluid">
    <ol class="breadcrumb breadcrumb-col-pink ">
      <li><a href="{{ route('admin.category.index') }}"> <i class="material-icons">apps</i>Category</a></li>
    </ol>
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1">
        <div class="card">
          <div class="header">
            <h3>Category Control
              <span>
                <a class="btn bg-success btn-success waves-float" data-toggle="modal" data-target="#addCategory">
                  Add
                </a>
              </span>
            </h3>
          </div>
          <div class="body">
            <div class="table  table-responsive text-center">
              <table class="table-bordered table-striped table-hover @if(count($categories)>0) dataTable js-exportable @endif">

                @if (count($categories)>0)
                <thead>
                  <tr class="text-uppercase">
                    <th>Photo</th>
                    <th>Category</th>
                    <th>Post Count</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $item)
                  <tr>
                    <td><img src="{{ asset('/').$item->image }}" style="width:100px " alt="Category">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->posts->count() }}</td>
                    <td>
                      @if ($item->status==1)
                      <h4><span class="label label-success">Active</span></h4>
                      @else
                      <h4><span class="label label-danger">Inactive</span></h4>
                      @endif
                    </td>
                    <td>
                      {{-- <a href="{{ route('category.edit',['id'=>$category->id]) }}" --}}
                      @if ($item->status==1)
                      <a href="{{ route('admin.category.unpublished',['id'=>$item->id]) }}" class="btn btn-success btn-circle waves-effect waves-circle waves-float waves-light" id="unpublished" data-toggle="tooltip" data-placement="top" title="Unpublished" data-original-title="Unpublished">
                        <i class="material-icons">arrow_downward</i>
                      </a>
                      @else
                      <a href="{{ route('admin.category.published',['id'=>$item->id]) }}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light" id="published" data-toggle="tooltip" data-placement="top" title="Published" data-original-title="Published">
                        <i class="material-icons">publish</i>
                      </a>
                      @endif
                      <a class="btn bg-success btn-info btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#editCategory" data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                        <i class="material-icons">edit</i>
                      </a>
                      <a id="delete" href="{{ route('admin.category.delete',['id'=>$item->id]) }}" class="btn bg-success btn-danger btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                @else
                <span class=" text-danger"> No data found </span>
                @endif
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Exportable Table -->
  </div>
</section>
@include('backend.admin.category.create')
@include('backend.admin.category.edit')
@endsection
@push('js')


{{-- Update Service  --}}
<script>
  $('#editCategory').on('show.bs.modal', function(event) {
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
  //Image Show Before Upload End

</script>
@endpush
