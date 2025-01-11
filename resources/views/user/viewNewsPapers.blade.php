@extends('layouts.userLayout')

@section('title')
  <title>User - All Newspapers</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>All Newspapers</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user_dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Newspapers</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <!-- newspaper -->
        <div class="col-12">
            <div class="card add-book overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">All Newspapers <span></span></h5>
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
                            @foreach ($newsPapers as $newspaper)
                                <tr>
                                    <th scope="row">{{ $newspaper -> id}}</th>
                                    <td>{{ $newspaper -> title}}</td>
                                    <td>{{ $newspaper -> publisher}}</td>
                                    <td>{{ $newspaper -> publicationDate}}</td>
                                    <td>{{ $newspaper -> shelfLocation}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End newspaper  -->
    </div>
</section>

@endsection
