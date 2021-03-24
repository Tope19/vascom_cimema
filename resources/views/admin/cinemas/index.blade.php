@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Vascom Cinemas</a></li>
                        <li class="breadcrumb-item active">Cinema Lists</li>
                    </ol>
                </div>
                <h5 class="page-title">Cinema Lists</h5>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">View Created Cinemas</h4>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($cinemas as $cin)
                                <tr>
                                    <td>{{$cin->id}}</td>
                                    <td>{{$cin->name}}</td>
                                    <td>{{$cin->address}}</td>
                                    <td>@if (!empty($cin->image))
                                        <a href="{{ $admin_source }}/cinema_images/{{ $cin->image }}" target="_blank" class="btn btn-primary btn-xs">View</a>
                                        @endif</td>
                                    <td>{{date('D , d M Y',strtotime($cin->created_at)) }}</td>
                                    <td class="center">
                                        <form action="{{ route('admin.cinemas.destroy' , $cin)}}" method="post">@csrf @method('delete')
                                            <a href="{{ route('admin.cinemas.edit' , $cin)}}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                {{ $cinemas->links() }}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->

@endsection
