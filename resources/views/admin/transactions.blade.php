@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Transactions</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Transactions</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_transactions')}}">Transactions</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class='card-body'>
        <button type="submit" class="btn btn-success"><a href="{{route('admin_issue_book')}}">Issue Book</a></button>
        <button type="submit" class="btn btn-success"><a href="{{route('admin_return_book')}}">Return Book</a></button>
        <button type="reset" class="btn btn-primary"><a href="">Print Preview</a></button>
        <button type="reset" class="btn btn-dark"><a href="">Save CSV</a></button>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Transactions</h5>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book ID</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Member ID</th>
                                <th scope="col">Transaction Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Return Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <th scope="row">{{ $transaction -> id }}</th>
                                    <td>{{ $transaction -> book_id}}</td>
                                    <td>{{ $transaction -> book-> title}}</td>
                                    <td>{{ $transaction -> member_id}}</td>
                                    <td>{{ $transaction -> transaction_date}}</td>
                                    <td>{{ $transaction -> due_date}}</td>
                                    <td>{{$transaction -> return_date}}</td>
                                    <td>
                                        @if (is_null($transaction -> return_date))
                                            <span class="badge rounded-pill bg-secondary">Borrowed</span>
                                        @else
                                            <span class="badge rounded-pill bg-success">Returned</span>
                                        @endif
                                    </td>
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
