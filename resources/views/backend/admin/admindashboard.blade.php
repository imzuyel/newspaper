@extends('backend.master')
@section('title') This is Inventory Management System @endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>WELCOME ! DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">work</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PENDDING POST</div>
                        <div class="number count-to" data-speed="1000" data-fresh-interval="20">{{ count($pendding_post) }}
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">live_help</i>
                    </div>
                    <div class="content">
                        <div class="text text-uppercase">subscriber</div>
                        <div class="number count-to" data-speed="1000" data-fresh-interval="20">{{ count($subscriber) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">label</i>
                    </div>
                    <div class="content">
                        <div class="text text-uppercase">Tags</div>
                        <div class="number count-to" data-speed="1000" data-fresh-interval="20">{{ count($tags) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-purple hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">apps</i>
                    </div>
                    <div class="content">
                        <div class="text text-uppercase">Category</div>
                        <div class="number count-to" data-speed="1000" data-fresh-interval="20">{{ count($categories) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>



            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-8 ">
                    <div class="card">
                        <div class="header">
                            <h3>Website Setting <span>

                                    @if(count($setting)===0)
                                    <a class="btn bg-success btn-success waves-float" data-toggle="modal"
                                        data-target="#addSetting">
                                        Add
                                    </a>
                                    @endif
                                </span></h3>
                        </div>
                        <div class="body">
                            <div class="table-responsive">

                                @if (count($setting)>0)
                                <table class="table-bordered table-striped table-hover center">

                                    <thead>
                                        <tr class="text-uppercase">
                                            <th>Icon</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>About</th>
                                            <th>Address</th>
                                            <th>Copyright</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($setting as $item)
                                        <tr>
                                            <td><img src="{{ asset('').$item->image }}" alt="Icon"></td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ Str::limit($item->about,100) }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->copyright }}</td>
                                            <td>

                                                <a class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float"
                                                    data-toggle="modal" data-target="#editSetting" data-id="{{ $item->id }}"
                                                    data-copyright="{{ $item->copyright }}" data-email="{{ $item->email }}"
                                                    data-address="{{ $item->address }}" data-phone="{{ $item->phone }}"
                                                    data-about="{{ $item->about }}">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                @else
                                <span class="text-warning">No date Found</span>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

</section>
@include('backend.admin.setting.create')
@include('backend.admin.setting.edit')
@endsection
@push('js')
{{--  Update Category  --}}
<script>
    $('#editSetting').on('show.bs.modal', function (event) {
   var button = $(event.relatedTarget)
   var id = button.data('id')
   var copyright = button.data('copyright')
   var email = button.data('email')
   var phone = button.data('phone')
   var address = button.data('address')
   var about = button.data('about')
   var modal = $(this)

   modal.find('.modal-body #copyright').val(copyright)
   modal.find('.modal-body #email').val(email)
   modal.find('.modal-body #phone').val(phone)
   modal.find('.modal-body #address').val(address)
   modal.find('.modal-body #about').val(about)
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
