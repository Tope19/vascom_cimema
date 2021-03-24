@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Vascom Cinema</a></li>
                        <li class="breadcrumb-item active">Edit Showtime</li>
                    </ol>
                </div>
                <h5 class="page-title">Edit Showtime</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Edit Showtime</h4>

                            <form class="" enctype="multipart/form-data" method="POST" action="{{ route('admin.showtimes.update' , $showtime) }}">{{csrf_field()}} @method('put')
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Movie</label>
                                            <div>
                                                <select name="movie_id"  class="form-control" required autofocus>
                                                    <option value="" disabled selected> Select One</option>
                                                    @foreach ($movies as $mov)
                                                        <option value="{{ $mov->id }}" {{ $showtime->movie_id == $mov->id ? 'selected' : ''}}>{{ $mov->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cinema</label>
                                            <div>
                                                <select name="cinema_id"  class="form-control" required autofocus>
                                                    <option value="" disabled selected> Select One</option>
                                                    @foreach ($cinemas as $cin)
                                                        <option value="{{ $cin->id }}" {{ $showtime->cinema_id == $cin->id ? 'selected' : ''}}>{{ $cin->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div>
                                                <input type="text" name="datetime" maxlength="50" id="" class="form-control" required autofocus value="{{ $showtime->datetime }}">
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
@endsection
