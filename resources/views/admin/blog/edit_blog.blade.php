@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Blog</h4>

                            <form method="POST" action="{{ route('update.blog') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $blog->id }}">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Select Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="blog_category_id">
                                            <option selected disabled>Open this select menu</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $blog->blog_category_id ? 'selected' : '' }}>
                                                    {{ $category->blog_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="blog_title" id="blog_title"
                                            value="{{ $blog->blog_title }}">
                                        @error('blog_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="about_image" class="col-sm-2 col-form-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="blog_image" id="about_image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ !empty($blog->blog_image) ? url($blog->blog_image) : url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="blog_tags" class="col-sm-2 col-form-label">Blog Tags</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $blog->blog_tags }}" type="text"
                                            name="blog_tags" data-role="tagsinput" placeholder="tags">
                                        @error('blog_tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="blog_description" class="col-sm-2 col-form-label">Blog
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="blog_description">
                                            {{ $blog->blog_description }}
                                        </textarea>
                                    </div>
                                </div>

                                <input type="submit" name="submit"
                                    class="btn btn-info btn-rounded waves-effect waves-light" value="Update Blog">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#about_image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection
