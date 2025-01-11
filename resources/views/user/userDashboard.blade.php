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
                <!-- Borrowed book Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card borrowed-book-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Borrowed Book <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img class="card-img-top" src="assets/img/user.jpg" alt="Card image cap" >
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalBorrowedBookCount }}</h6>
                                    <a href="{{route('user_transactions')}}" class="btn btn-primary"><i class="bi bi-eye"> See More</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Borrowed book Card -->

                <!-- Revered book Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card reserved-book-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Revered Books <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img class="card-img-top" src="assets/img/user.jpg" alt="Card image cap" >
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalBorrowedBookCount }}</h6>
                                    <a href="{{route('user_reservations')}}" class="btn btn-primary"><i class="bi bi-eye"> See More</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Revered book Card -->
            </div>
        </div><!-- End Left side columns -->

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
    </div>


    <div class="row">
        <!-- books -->
        <div class="col-12">
            @if($notices)
                @foreach($notices as $notice)
                    <div class="card add-book overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">{{ $notice -> title }} <span> | {{ $notice -> publicationDate }}</span></h5>
                            <div class="card-body">
                                <p class="card-text"> {{ $notice -> content}} </p>
                                <p class="card-text">By </p>
                                <p class="fst-italic">{{ $notice -> author }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- End Book  -->
    </div>



</section>
@endsection
