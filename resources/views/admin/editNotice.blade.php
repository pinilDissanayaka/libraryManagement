@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Edit Notice</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Edit Notice</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_notices')}}">Notices</a></li>
            <li class="breadcrumb-item active"><a href="#">Edit Notice</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Existing Notice</h5>
                    <!-- Add Book Form -->
                    <form method="POST" action="{{route('admin_update_notice', [ 'notice'=> $notice])}}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="bookTitle" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bookTitle" name='title' value="{{ $notice -> title}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="author" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="noticeAuthor" name='author' value="{{ $notice -> author}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="publicationDate" class="col-sm-2 col-form-label">Publication Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="publicationDate" name='publicationDate' value="{{ $notice -> publicationDate}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="content" name='content' value="{{ $notice -> content}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status" name='status' value="{{ $notice -> status}}">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                    <!-- End Add Book Form -->
                </div>
            </div>
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
    </div>
</section>

@endsection
