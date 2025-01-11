@extends('layouts.userLayout')

@section('title')
  <title>User - View Reservation</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>View Reservation</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('user_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('user_reservations')}}">Reservations</a></li>
            <li class="breadcrumb-item active"><a href="#">View Reservation</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->


<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Existing Reservation</h5>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Reservation ID</div>
                        <div class="col-lg-9 col-md-8"> {{ $reservation -> id }} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Book ID</div>
                        <div class="col-lg-9 col-md-8"> {{ $reservation -> book_id}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Book Title</div>
                        <div class="col-lg-9 col-md-8"> {{ $reservation -> title}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Reserved Date</div>
                        <div class="col-lg-9 col-md-8"> {{ $reservation -> reserved_date}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Status</div>
                        <div class="col-lg-9 col-md-8"> {{ $reservation -> status}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Cancel date</div>
                        <div class="col-lg-9 col-md-8"> {{ $reservation -> cancel_date}}  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
