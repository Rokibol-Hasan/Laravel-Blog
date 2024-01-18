@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <center>
                        <img class="rounded-circle avatar-xl mt-3"
                            src="{{ (!empty($adminData->profile_image)) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                            alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <hr>
                            <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                            <hr>
                            <p class="card-title">Username: {{ $adminData->username }}</p>
                            <hr>
                            <p class="card-title">Email: {{ $adminData->email }}</p>
                            <hr>
                            <p class="card-text">
                                <small class="text-muted"> {{ $adminData->created_at->diffForHumans() }}</small>
                            </p>
                            <a href="{{ route('admin.profile.edit') }}" type="button"
                                class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
