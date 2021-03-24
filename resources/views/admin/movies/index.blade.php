@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Vascom movies</a></li>
                        <li class="breadcrumb-item active">Movie Lists</li>
                    </ol>
                </div>
                <h5 class="page-title">Movie Lists</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">View Created Movies</h4>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spamovg: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cinema Name</th>
                                <th>Movie Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($movies as $mov)
                                <tr>
                                    <td>{{$mov->id}}</td>
                                    <td>{{$mov->cinema->name}}</td>
                                    <td>{{$mov->name}}</td>
                                    <td>{{ $mov->description }}</td>
                                    <td>@if (!empty($mov->image))
                                        <a href="{{ asset('movie_images/'.$mov->image) }}" target="_blank" class="btn btn-primary btn-xs">View</a>
                                        @endif</td>
                                    <td>{{date('D , d M Y',strtotime($mov->created_at)) }}</td>
                                    <td class="center">
                                        <form action="{{ route('admin.movies.destroy' , $mov)}}" method="post">@csrf @method('delete')
                                            <a href="{{ route('admin.movies.edit' , $mov)}}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                {{ $movies->links() }}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

@endsection
