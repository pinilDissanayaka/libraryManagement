@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Users</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_users')}}">Users</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class='card-body'>
        <button type="submit" class="btn btn-success"><a href="{{route('admin_addUser')}}"><i class="bi bi-person-add"> </i> Add New</a></button>
        <button type="reset" class="btn btn-danger"><a href="">Print Preview</a></button>
        <button type="reset" class="btn btn-danger"><a href="">Save CSV</a></button>
    </div>
</section>

<section class="section">
    <div class="row">
        <!-- users -->
        <div class="col-12">
            <div class="card add-user overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">All Books <span></span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user -> id}}</th>
                                    <td>{{ $user -> name}}</td>
                                    <td>{{ $user -> email}}</td>
                                    <td>{{ $user -> userType}}</td>
                                    <td>{{ $user -> created_at}}</td>
                                    <td>{{ $user -> updated_at}}</td>
                                    <td>
                                        <div class='text-center'>
                                            <div class="btn-group" role="group">
                                                    <form method="POST" action="{{route('admin_delete_user', $user -> id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModel"><i class="bi bi-person-dash"> </i> Delete</button>
                                                        <!-- Delete User Modal -->
                                                        <div class="modal fade" id="deleteUserModel" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Delete User</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Once deleted, all of its resources and data will be permanently deleted. Before deleting, please download any data or information that you wish to retain.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger">Delete User</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Delete User Modal-->
                                                    </form>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End user  -->
    </div>

    <div class="col-12">
        @if ($errors -> any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle"></i>
                    {{$error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                {{ session('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</section>

@endsection
