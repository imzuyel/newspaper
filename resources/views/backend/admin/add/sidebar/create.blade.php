<div class="modal fade" id="addAdd2" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           Sidebar Addvisment Add
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.add2.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <b>Link</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="link" id="link">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <b>Add Image</b>
                                    <div class="form-group form-float">

                                        <img src="{{ asset('/') }}backend/images/camera.png"
                                            style="height: 100px; width: 200px" alt="" id="photo">
                                        <input type="file" class="custom-file-input" accept="image/*" name="image"
                                            id="photo" onchange="showImage(this, 'photo')">
                                        <label class="custom-file-label" for="inputGroupFile02" id="fileLabel1"></label>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary  m-l-15 waves-effect">ADD</button>
                                    <button type="button" class="btn btn-danger waves-effect"
                                        data-dismiss="modal">CLOSE</button>
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
