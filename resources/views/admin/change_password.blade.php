@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Change Password</h4>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form method="POST" action="{{ route('update.password') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="oldpassword" class="col-sm-4 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="oldpassword" id="oldpassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newpassword" class="col-sm-4 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="newpassword" id="newpassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="confirm_password"
                                            id="confirm_password">
                                    </div>
                                </div>

                                <input type="submit" name="submit"
                                    class="btn btn-info btn-rounded waves-effect waves-light" value="Update Password">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    @endsection
