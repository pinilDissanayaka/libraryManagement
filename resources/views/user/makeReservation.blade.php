@extends('layouts.userLayout')

@section('title')
  <title>User - Make Reservation</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Make Reservation</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('user_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('user_reservations')}}">Reservations</a></li>
            <li class="breadcrumb-item active"><a href="{{route('user_make_reservations')}}">Make Reservation</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Make New Reservation</h5>
                    <!-- Make Reservation Form -->
                    @if (session('status'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle"></i>
                                {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (!session('book'))
                        <form action="{{route('user_get_book')}}" method="POST">
                            @csrf
                            @method('POST')
                                <div class="input-group mb-3">
                                        <label for="bookTitle" class="col-sm-2 col-form-label">Book Title</label>
                                        <input type="text" class="form-control" id="bookTitle" name='title'>
                                    <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"> Search</i></button>
                                    </div>
                                </div>
                        </form>
                    @else
                        <form method="POST" action="{{ route('user_store_reservations')}}">
                        @csrf
                        @method('post')
                            <div class="row mb-3">
                                <label for="bookID" class="col-sm-2 col-form-label">Book ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{session('book') -> id}}" name="book_id" id="book_id" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bookTitle" class="col-sm-2 col-form-label">Book Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="{{session('book') -> title}}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bookAuthor" class="col-sm-2 col-form-label">Book Author</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="{{session('book') -> author}}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bookISBN" class="col-sm-2 col-form-label">ISBN</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="{{session('book') -> ISBN}}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bookGenre" class="col-sm-2 col-form-label">Book Genre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="{{session('book') -> genre}}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="publicationYear" class="col-sm-2 col-form-label">Publication Year</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="{{session('book') -> publicationYear}}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="description" name='description' style="height: 100px;" placeholder="{{session('book') -> description}}" readonly></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="shelfLocation" class="col-sm-2 col-form-label">Shelf Location</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="{{session('book') -> shelfLocation}}" readonly>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Reverve Book</button>
                                <a href="{{route('user_make_reservations')}}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    @endif
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
