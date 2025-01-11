@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Notices</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Notices</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_notices')}}">Notices</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class='card-body'>
        <button type="submit" class="btn btn-success"><a href="{{route('admin_addNotice')}}"><i class="bi bi-file-earmark-plus"> </i> Add New</a></button>
        <button type="reset" class="btn btn-danger"><a href="">Print Preview</a></button>
        <button type="reset" class="btn btn-danger"><a href="">Save CSV</a></button>
    </div>
</section>

<section class="section">
    <div class="row">
        <!-- books -->
        <div class="col-12">
            <div class="card add-book overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">All Notices <span></span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Author</th>
                                <th scope="col">Publication Date</th>
                                <th scope="col">Status</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $notice)
                                <tr>
                                    <th scope="row">{{ $notice -> id}}</th>
                                    <td>{{ $notice -> title}}</td>
                                    <td>{{ $notice -> content}}</td>
                                    <td>{{ $notice -> author}}</td>
                                    <td>{{ $notice -> publicationDate}}</td>
                                    <td>{{ $notice -> status}}</td>
                                    <td>
                                        @if (($notice -> status) == 'Active')
                                            <span class="badge rounded-pill bg-success">Active</span>
                                        @elseif (($notice -> status) == 'Inactive')
                                            <span class="badge rounded-pill bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class='text-center'>
                                            <div class="btn-group" role="group">
                                                <form method="POST" action="{{route('admin_view_notice', ['notice' => $notice])}}">
                                                    @csrf
                                                    @method('GET')
                                                    <button type="submit" class="btn btn-info">View</button>
                                                </form>
                                                <form method="POST" action="{{route('admin_edit_notice', ['notice'=> $notice])}}">
                                                    @csrf
                                                    @method('GET')
                                                    <button type="submit" class="btn btn-success">Edit</button>
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
        <!-- End Book  -->
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
    </div>
</section>

@endsection
