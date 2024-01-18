@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Portfolios</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Portfolio_Name</th>
                                        <th>Portfolio_Title</th>
                                        <th>Portfolio_Image</th>
                                        {{-- <th>Portfolio_Description</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portfolio as $singlePortfolio)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$singlePortfolio->portfolio_name}}</td>
                                        <td>{{$singlePortfolio->portfolio_title}}</td>
                                        <td><img src="{{asset($singlePortfolio->portfolio_image)}}" height="50px" width="60px" alt="no img"></td>
                                        <td>
                                        <a href="{{route('edit.portfolio',$singlePortfolio->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-pen-nib"></i></a>
                                        <a href="{{route('delete.portfolio',$singlePortfolio->id)}}" class="btn btn-danger sm" id="delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
