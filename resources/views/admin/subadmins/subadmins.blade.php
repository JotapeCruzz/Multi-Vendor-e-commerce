@extends('admin.layout.layout')
@section('content')
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Admin Management</h3>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header--> 
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Sub Administrator</h3>
                                <a style="max-width: 150px; float:right; display: inline-block;" href="{{ url('admin/add-edit-subadmin') }}" 
                                    class="btn btn-block btn-primary"> Add Sub Admin
                                </a>
                            </div>
                            <div class="card-body">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                                    <strong>Success: </strong> {{ Session::get('success_message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">ID</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Mobile</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($subadmins as $subadmin )
                                        <tr>
                                            <td>{{ $subadmin -> id }}</td>
                                            <td>{{ $subadmin -> name }}</td>
                                            <td>{{ $subadmin -> email }}</td>
                                            <td>{{ $subadmin -> mobile }}</td>
                                            <td>
                                                @if($subadmin->status==1)
                                                <a class="updateSubadminStatus" 
                                                data-subadmin_id="{{ $subadmin->id }}" style='color:#3f6ed3' 
                                                href="javascript:void(0)"><i class="fas fa-toggle-on" data-status="Active"></i></a>
                                                @else
                                                <a class="updateSubadminStatus" data-subadmin_id="{{ $subadmin->id }}" 
                                                style="color:grey" href="javascript:void(0)"><i class="fas fa-toggle-off" 
                                                data-status="Inactive"></i></a>
                                                @endif
                                                &nbsp;&nbsp;<a href="{{ 'add-edit-subadmin/'.$subadmin->id }}"><i class="fas fa-edit"></i></a>
                                                &nbsp;&nbsp;<a title="Set Permissions for Sub-Admin" 
                                                href="{{ url('admin/update-role/'.$subadmin->id) }}"><i class="fas fa-unlock"></i></a>
                                                &nbsp;&nbsp;<a style='color:#3f6ed3;' 
                                                title="Delete Subadmin" href="{{ url('admin/delete-subadmin/'.$subadmin->id) }}"><i class="fas fa-trash"></i></a>
                                                
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection