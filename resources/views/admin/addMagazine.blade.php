@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Add Magazine</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Add Magazine</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_magazines')}}">Magazines</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_addMagazine')}}">Add Magazine</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Magazine</h5>
                    <!-- Add Book Form -->
                    <form method="POST" action="{{route('admin_store_magazine')}}">
                        @csrf
                        @method('post')
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name='title'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="publisher" name='publisher'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="publicationDate" class="col-sm-2 col-form-label">Publication Date</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" id="publicationDate" name='publicationDate'>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="shelfLocation" class="col-sm-2 col-form-label">Shelf Location</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="shelfLocation" name='shelfLocation'>
                                    <option selected>Open this select menu</option>
                                    <option value="001">Shelf 001</option>
                                    <option value="002">Shelf 002</option>
                                    <option value="003">Shelf 003</option>
                                    <option value="004">Shelf 004</option>
                                    <option value="005">Shelf 005</option>
                                    <option value="006">Shelf 006</option>
                                    <option value="007">Shelf 007</option>
                                    <option value="008">Shelf 008</option>
                                    <option value="009">Shelf 009</option>
                                    <option value="010">Shelf 010</option>
                                    <option value="011">Shelf 011</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Add</button>
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

