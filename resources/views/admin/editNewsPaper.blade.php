@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Edit Newspaper</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Edit Newspaper</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_newsPapers')}}">Newspapers</a></li>
            <li class="breadcrumb-item active"><a href="#">Edit Newspaper</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Existing Newspaper</h5>
                    <!-- Add Newspaper Form -->
                    <form method="POST" action="{{route('admin_update_newspaper', [ 'newsPaper'=> $newsPaper])}}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="bookTitle" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bookTitle" name='title' value="{{ $newsPaper -> title}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="publisher" name='publisher' value="{{ $newsPaper -> publisher}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="publicationDate" class="col-sm-2 col-form-label">Publication Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="publicationDate" name='publicationDate' value="{{ $newsPaper -> publicationDate}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="shelfLocation" class="col-sm-2 col-form-label">Shelf Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="shelfLocation" name='shelfLocation' value="{{ $newsPaper -> shelfLocation}}">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                    <!-- End Add Newspaper Form -->
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
