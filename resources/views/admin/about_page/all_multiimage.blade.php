@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Multiple Icons Of About Section</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Multiple Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allMultiImage as $image)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset($image->multi_image) }}" height="50px" width="60px"
                                                    alt="no img"></td>
                                            <td>
                                                <a href="{{ route('edit.multi.image', $image->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"><i class="fas fa-pen-nib"></i></a>
                                                <a href="{{ route('delete.multi.image', $image->id) }}"
                                                    class="btn btn-danger sm" id="delete" title="Delete Data"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
