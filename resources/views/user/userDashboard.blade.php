@extends('layouts.userLayout')

@section('title')
  <title>User - Dashboard</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
            </div>
        </div><!-- End Left side columns -->
    </div>

    <!-- Right side columns -->
    <div class="col-lg-4">
        <!-- Recent Activity -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Recent Activity <span>| Today</span></h5>
                <div class="activity">

                    @foreach ($notifications as $notification)
                    @if ($notification['type'] == 'Borrowed')
                        <div class="activity-item d-flex">
                            <div class="activite-label">{{$notification['created_at']}}</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                                {{$notification['type']}} Book {{ $notification['title']}} with {{$notification['ISBN']}} ISBN. It should be return on or before {{$notification['due_date']}}.
                            </div>
                        </div>
                        <!-- End activity item-->
                    @elseif ($notification['type'] == 'Return')
                    <div class="activity-item d-flex">
                        <div class="activite-label">{{$notification['created_at']}}</div>
                        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                        <div class="activity-content">
                            {{$notification['type']}} Book {{ $notification['title']}} with {{$notification['ISBN']}} ISBN.
                        </div>
                    </div>

                    @elseif ($notification['type'] == 'Pay')
                    <div class="activity-item d-flex">
                        <div class="activite-label">{{$notification['created_at']}}</div>
                        <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                        <div class="activity-content">
                            Should be  {{$notification['type']}} Rs. {{ $notification['fine']}} for over due book.
                        </div>
                    </div>

                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Recent Activity -->
    </div><!-- End Right side columns -->
</section>
@endsection
