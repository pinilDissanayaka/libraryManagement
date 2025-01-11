@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Return Book</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Return Book</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_transactions')}}">Transactions</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_return_book')}}">Return Book</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Return Book</h5>

                    @if (!session('transaction'))
                        <form action="{{route('admin_get_transaction')}}" method="POST">
                            @csrf
                            @method('POST')
                                <div class="input-group mb-3">
                                        <label for="bookID" class="col-sm-2 col-form-label">Book ID</label>
                                        <input type="text" class="form-control" id="book_id" name='book_id'>
                                    <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"> Search</i></button>
                                    </div>
                                </div>
                        </form>
                    @else
                        <!-- Return book Form -->
                        <form method="POST" action="{{route('admin_store_return_book')}}">
                            @csrf
                            @method('post')

                            @if (session('transaction'))
                                <div class="row mb-3">
                                    <label for="transaction_id" class="col-sm-2 col-form-label">Transaction ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{session('transaction') -> id}}" name="id" id="id" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bookID" class="col-sm-2 col-form-label">Book ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="{{session('book') -> id}}" readonly>
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
                                    <label for="memberID" class="col-sm-2 col-form-label">Member ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="member_id" name='member_id' value="{{session('transaction') -> member_id}}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="memberName" class="col-sm-2 col-form-label">Member Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="{{session('user') -> name}}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="dueDate" class="col-sm-2 col-form-label">Due Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="{{session('transaction') -> due_date}}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="returnDate	" class="col-sm-2 col-form-label">Return Date</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" id="return_date" name='return_date'>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Return Book</button>
                                    <a href="{{route('admin_return_book')}}" class="btn btn-secondary">Reset</a>
                                </div>
                            @endif
                        </form>
                        <!-- End return Book Form -->
                    @endif

                    @if (session('status'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle"></i>
                                {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
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
