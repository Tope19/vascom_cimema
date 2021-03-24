@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Vascom Cinemas</a></li>
                        <li class="breadcrumb-item active">Showtime Lists</li>
                    </ol>
                </div>
                <h5 class="page-title">Showtime Lists</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">View Created Showtimes</h4>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Movie Name</th>
                                <th>Cinema Name</th>
                                <th>Date and Time</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($shows as $show)
                                <tr>
                                    <td>{{$show->id}}</td>
                                    <td>{{$show->movie->name}}</td>
                                    <td>{{$show->cinema->name}}</td>
                                    <td>{{ $show->datetime }}</td>
                                    <td>{{date('D , d M Y',strtotime($show->created_at)) }}</td>
                                    <td class="center">
                                        <form action="{{ route('admin.showtimes.destroy' , $show)}}" method="post">@csrf @method('delete')
                                            <a href="{{ route('admin.showtimes.edit' , $show)}}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                {{ $shows->links() }}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

@endsection
