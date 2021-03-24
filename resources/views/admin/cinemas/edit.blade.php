@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Vascom Cinema</a></li>
                        <li class="breadcrumb-item active">Edit Cinema</li>
                    </ol>
                </div>
                <h5 class="page-title">Edit Cinema</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Edit Cinema</h4>

                            <form class="" enctype="multipart/form-data" method="POST" action="{{ route('admin.cinemas.update' , $cinema) }}">{{csrf_field()}} @method('put')
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div>
                                                <input type="text" name="name" maxlength="100" id="" class="form-control" required autofocus value="{{ $cinema->name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <div>
                                                <textarea name="address" id="summernote" required rows="5" cols="40" class="form-control summernote" required value="">{{ $cinema->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div>
                                                <input type="file" name="image" class="form-control" value="{{ $cinema->image }}" id="image" />
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container fluid -->
    <script>
        $('#summernote').summernote({
            placeholder: 'Enter Blog Description',
            tabsize: 2,
            height: 120,
            toolbar: [
              ['style', ['style']],
              ['font', ['bold', 'underline', 'clear']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture', 'video']],
              ['view', ['fullscreen', 'codeview', 'help']]
            ]
          });
    </script>
@endsection
