@extends('admin.layout.app')
@section('content')
<div class="container-fluid">  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Destination</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Destination List</h6>
        <div class="text-right">
        <a href="{{ route('admin.destination.create')}}" class="btn btn-sm btn-primary">Tambah Destinasi</a>
        </div>
    </div>
    
    <div class="card-body">
        @include('alerts.success')
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($destination as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->thumbnail}}</td>
                    <td>
                        <form action="{{ route('admin.destination.destroy', $row->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.destination.edit', $row->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <button type="submit"  class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection