@extends('layouts.adminLayout')

@section('title')
  <title>Admin - View Book</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>View Book</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_books')}}">Books</a></li>
            <li class="breadcrumb-item active"><a href="#">View Book</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class='card-body'>
        <button type="submit" class="btn btn-success"><a href="{{ route('admin_edit_book',[ 'book'=> $book]) }}">Edit</a></button>
        <button type="reset" class="btn btn-primary"><a href="">Print Preview</a></button>
        <button type="reset" class="btn btn-dark"><a href="">Save CSV</a></button>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Existing Book</h5>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">ID</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> id}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Title</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> title}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Author</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> author}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">ISBN</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> ISBN}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Genre</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> genre}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Publication Year</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> publicationYear}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Description</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> description}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Shelf Location</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> shelfLocation}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Status</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> status}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Created At</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> created_at}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Updated At</div>
                        <div class="col-lg-9 col-md-8"> {{ $book -> updated_at}}  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transaction History</h5>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Book ID</th>
                                <th scope="col">Member ID</th>
                                <th scope="col">Transaction Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Return date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                        <th scope="row">{{ $transaction -> id}}</th>
                                        <td>{{ $transaction -> book_id}}</td>
                                        <td>{{ $transaction -> member_id}}</td>
                                        <td>{{ $transaction -> transaction_date}}</td>
                                        <td>{{ $transaction -> due_date}}</td>
                                        <td>{{ $transaction -> return_date}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
