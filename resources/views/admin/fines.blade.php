@extends('layouts.adminLayout')

@section('title')
  <title>Admin - Fine History</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Fine History</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_get_fine_history')}}">Fine History</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class='card-body'>
        <button type="reset" class="btn btn-primary"><a href="">Print Preview</a></button>
        <button type="reset" class="btn btn-dark"><a href="">Save CSV</a></button>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Fine History</h5>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Member ID</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Amount(LKR)</th>
                                <th scope="col">Paid At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fines as $fine)
                                <tr>
                                    <th scope="row">{{ $fine -> id }}</th>
                                    <td>{{ $fine -> member_id}}</td>
                                    <td>{{ $fine -> transaction_id}}</td>
                                    <td>{{ $fine -> amount}}</td>
                                    <td>{{ $fine -> paid_at}}</td>
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
