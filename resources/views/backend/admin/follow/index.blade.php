@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">

@endpush

@extends('backend.master')
@section('title') Services @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="{{ route('admin.flow') }}"> <i class="material-icons">gamepad</i>Flow</a></li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1">
                <div class="card">
                    <div class="header">
                        <h3>Folower Control <span><a class="btn bg-success btn-success waves-float" data-toggle="modal"
                                    data-target="#addFolower">
                                    Add
                                </a></span></h3>
                    </div>
                    <div class="body">
                        <div class="table col-lg-offset-1 table-responsive text-center">
                            <table
                                class="table-bordered table-striped table-hover @if(count($folowers)>0) dataTable js-exportable @endif">

                                @if (count($folowers)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($folowers as $item)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td>{{ $item->icon }}</td>
                                        <td>
                                            @if ($item->status==1)
                                            <h4><span class="label label-success">Active</span></h4>
                                            @else
                                            <h4><span class="label label-danger">Inactive</span></h4>
                                            @endif
                                        </td>
                                        <td>
                                            {{--  <a href="{{ route('category.edit',['id'=>$category->id]) }}" --}}
                                            @if ($item->status==1)
                                            <a href="{{ route('admin.flow.unpublished',['id'=>$item->id]) }}"
                                                class="btn btn-success btn-circle waves-effect waves-circle waves-float waves-light"
                                                id="unpublished" data-toggle="tooltip" data-placement="top"
                                                title="Unpublished" data-original-title="Unpublished">
                                                <i class="material-icons">arrow_downward</i>
                                            </a>
                                            @else
                                            <a href="{{ route('admin.flow.published',['id'=>$item->id]) }}"
                                                class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light"
                                                id="published" data-toggle="tooltip" data-placement="top"
                                                title="Published" data-original-title="Published">
                                                <i class="material-icons">publish</i>
                                            </a>
                                            @endif
                                            <a class="btn bg-success btn-info btn-circle waves-effect waves-circle waves-float"
                                                data-toggle="modal" data-target="#editFlow" data-id="{{ $item->id }}"
                                                data-link="{{ $item->link }}" data-icon="{{ $item->icon }}">
                                                <i class="material-icons">edit</i>
                                            </a>

                                            <a href="{{ route('admin.flow.delete',['id'=>$item->id]) }}"
                                                class="btn btn-danger btn-circle waves-effect waves-circle waves-float waves-light" id="delete"
                                                data-toggle="tooltip" data-placement="top" title="Published" data-original-title="Published">
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
@include('backend.admin.follow.create')
@include('backend.admin.follow.edit')
@endsection
@push('js')

{{--  Update Skill  --}}
<script>
    $('#editFlow').on('show.bs.modal', function (event) {
   var button = $(event.relatedTarget)
   var id = button.data('id')
   var link = button.data('link')
   var icon = button.data('icon')
   var description = button.data('description')
   var modal = $(this)

   modal.find('.modal-body #link').val(link)
   modal.find('.modal-body #icon').val(icon)
   modal.find('.modal-body #id').val(id)
  })
</script>
@endpush
