@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Edit Book</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Edit Books</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_books')}}">Books</a></li>
            <li class="breadcrumb-item active"><a href="#">Edit Book</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Existing Book</h5>
                    <!-- Add Book Form -->
                    <form method="POST" action="{{route('admin_update_book', [ 'book'=> $book])}}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="bookTitle" class="col-sm-2 col-form-label">Book Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bookTitle" name='title' value="{{ $book -> title}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="author" class="col-sm-2 col-form-label">Book Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bookAuthor" name='author' value="{{ $book -> author}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="isbn" name='ISBN' value="{{ $book -> ISBN}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="genre" class="col-sm-2 col-form-label">Book Genre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bookGenre" name='genre' value="{{ $book -> genre}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="publicationYear" class="col-sm-2 col-form-label">Publication Year</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="publicationYear" name="publicationYear" value="{{ $book -> publicationYear}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name='description' value="{{ $book -> description}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="shelfLocation" class="col-sm-2 col-form-label">Shelf Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="shelfLocation" name='shelfLocation' value="{{ $book -> shelfLocation}}">
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
