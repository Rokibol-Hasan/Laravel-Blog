@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Blog Category</h4>
                            <form method="POST" action="{{ route('store.blog.category') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="blog_category" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="blog_category"
                                            placeholder="Category Name"
                                            id="portfolio_name">
                                            @error('blog_category')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <input type="submit" name="submit"
                                    class="btn btn-info btn-rounded waves-effect waves-light" value="Add Category">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    @endsection
