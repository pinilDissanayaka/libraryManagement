@extends('layouts.adminLayout')

@section('title')
  <title>Admin - View Newspaper</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>View Newspaper</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_newsPapers')}}">Newspapers</a></li>
            <li class="breadcrumb-item active"><a href="#">View Newspaper</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class='card-body'>
        <button type="submit" class="btn btn-success"><a href="{{route('admin_edit_newspaper', ['newsPaper'=> $newsPaper])}}">Edit</a></button>
        <button type="reset" class="btn btn-primary"><a href="">Print Preview</a></button>
        <button type="reset" class="btn btn-dark"><a href="">Save CSV</a></button>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Existing Newspaper</h5>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Title</div>
                        <div class="col-lg-9 col-md-8"> {{ $newsPaper -> title}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Publisher</div>
                        <div class="col-lg-9 col-md-8"> {{ $newsPaper -> publisher}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Publication Date</div>
                        <div class="col-lg-9 col-md-8"> {{ $newsPaper -> publicationDate}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Shelf Location</div>
                        <div class="col-lg-9 col-md-8"> {{ $newsPaper -> shelfLocation}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Created</div>
                        <div class="col-lg-9 col-md-8"> {{ $newsPaper -> created_at}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Updated</div>
                        <div class="col-lg-9 col-md-8"> {{ $newsPaper -> updated_at}}  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
