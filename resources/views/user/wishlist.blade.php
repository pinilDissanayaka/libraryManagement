@extends('layouts.userLayout')

@section('title')
  <title>User - Wishlist</title>
@endsection

@section('main')
<div class="pagetitle">
    <h1>Wishlist</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('user_get_wishlist')}}">Wishlist</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <!-- wishlist -->
        <div class="col-12">
            <div class="card add-book overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Wishlist<span></span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Id</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">added_at</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishList as $item)
                                <tr>
                                    <th scope="row">{{ $item -> id}}</th>
                                    <td>{{ $item -> book_id }}</td>
                                    <td>{{ $item -> title }}</td>
                                    <td>{{ $item -> added_at }}</td>
                                    <td>
                                        <div class='text-center'>
                                            <form method="POST" action="{{ route('user_remove_wishlist', $item-> id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeWishlistModel">Remove</button>
                                                <!-- Remove Wishlist Modal -->
                                                <div class="modal fade" id="removeWishlistModel" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Remove From Wishlist</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Once deleted, all of its resources and data will be permanently deleted. Before deleting, please download any data or information that you wish to retain.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Remove Wishlist Modal-->
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- End Wishlist  -->
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

            @if (session('status'))
                @if (session('status') == 'Successfully added to the wishlist')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i>
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('status') == 'Given book already added to the wishlist')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i>
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>

@endsection
