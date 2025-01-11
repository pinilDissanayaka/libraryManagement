@extends('layouts.userLayout')

@section('title')
  <title>User - All Magazines</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>All Magazines</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user_dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Magazines</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <!-- Magazines -->
        <div class="col-12">
            <div class="card add-book overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">All Magazines <span></span></h5>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Publisher</th>
                                <th scope="col">Publication Date</th>
                                <th scope="col">Shelf Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($magazines as $magazine)
                                <tr>
                                    <th scope="row">{{ $magazine -> id}}</th>
                                    <td>{{ $magazine -> title}}</td>
                                    <td>{{ $magazine -> publisher}}</td>
                                    <td>{{ $magazine -> publicationDate}}</td>
                                    <td>{{ $magazine -> shelfLocation}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Magazines  -->
    </div>
</section>

@endsection
