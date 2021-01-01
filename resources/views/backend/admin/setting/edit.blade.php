<div class="modal fade" id="editSetting" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Setting Update
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.website.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <b>Address</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="address" id="address">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <b>Phone</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone" id="phone">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <b>Email</b>
                                        <div class="form-line">
                                            <input type="mail" class="form-control" name="email" id="email">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <b>Copyright</b>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="copyright" id="copyright">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <b>About</b>
                                        <div class="form-line">
                                            <textarea id="about" rows="2" name="about" class="form-control no-resize"
                                                placeholder="Please type what you want..." required
                                                autofocus></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <b>Logo Image</b>
                                    <div class="form-group form-float">

                                        <img src="{{ asset('/') }}backend/images/camera.png"
                                            style="height: 100px; width: auto" alt="" id="file">
                                        <input type="file" class="custom-file-input" accept="image/*" name="image"
                                            id="file" onchange="showImage(this, 'file')">
                                        <label class="custom-file-label" for="inputGroupFile02" id="fileLabel1"></label>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary  m-l-15 waves-effect">UPDATE</button>
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
