@extends('layouts.adminLayout')

@section('title')
  <title>Admin - View Notice</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>View Notice</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_notices')}}">Notices</a></li>
            <li class="breadcrumb-item active"><a href="#">View Notice</a></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class='card-body'>
        <button type="submit" class="btn btn-success"><a href="{{route('admin_edit_notice', ['notice'=> $notice])}}">Edit</a></button>
        <button type="reset" class="btn btn-primary"><a href="">Print Preview</a></button>
        <button type="reset" class="btn btn-dark"><a href="">Save CSV</a></button>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Existing Notice</h5>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">ID</div>
                        <div class="col-lg-9 col-md-8"> {{ $notice -> id}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Title</div>
                        <div class="col-lg-9 col-md-8"> {{ $notice -> title}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Author</div>
                        <div class="col-lg-9 col-md-8"> {{ $notice -> author}} </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Publication Date</div>
                        <div class="col-lg-9 col-md-8"> {{ $notice -> publicationDate}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Content</div>
                        <div class="col-lg-9 col-md-8"> {{ $notice -> content}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Status</div>
                        <div class="col-lg-9 col-md-8"> {{ $notice -> status}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Created At</div>
                        <div class="col-lg-9 col-md-8"> {{ $notice -> created_at}}  </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Updated At</div>
                        <div class="col-lg-9 col-md-8"> {{ $notice -> updated_at}}  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
