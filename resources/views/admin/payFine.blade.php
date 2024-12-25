@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Pay Fine</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Pay Fine</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_transactions')}}">Transactions</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_return_book')}}">Return Book</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_get_fine_details')}}">Pay Fine</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pay Fine</h5>

                    <!-- Pay Fine Form -->
                    <form method="POST" action="{{ route('admin_store_paid_fine') }}">
                        @csrf
                        @method('post')
                        <div class="row mb-3">
                            <label for="transactionId" class="col-sm-2 col-form-label">Transaction ID</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ session('transaction') -> id }}" name="transaction_id" id="transaction_id" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="memberId" class="col-sm-2 col-form-label">Member ID</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ session('transaction') -> member_id }}" name="member_id" id="member_id" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fineAmount" class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ session('transaction') -> amount }}" id="amount" name="amount" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="payDate" class="col-sm-2 col-form-label">Pay Date</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" id="paid_at" name='paid_at'>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Pay Now</button>
                            <a href="#" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                    <!-- Pay Fine Form -->

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
