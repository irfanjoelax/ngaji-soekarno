@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-lg-4 mb-3">
                <div class="d-flex flex-column gap-2">
                    <h2 class="m-0 fw-bold">Home</h2>
                    <h6 class="m-0 text-muted fw-semibold">Welcome to {{ env('APP_NAME') }} and Manage Your Post</h6>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-4 col-6 mb-3">
                <div class="bg-primary p-3 rounded-4 text-white d-flex align-items-center justify-content-between">
                    <div class="m-0">
                        <h1 class="m-0 display-4 fw-semibold">{{ $all_post }}</h1>
                        <h6 class="m-0 fw-semibold">
                            All Post
                        </h6>
                    </div>
                    <h1 class="m-0 display-4">
                        <i class="fa-solid fa-list-check"></i>
                    </h1>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-6 mb-3">
                <div class="bg-success p-3 text-white rounded-4 d-flex align-items-center justify-content-between">
                    <div class="m-0">
                        <h1 class="m-0 display-4 fw-semibold">{{ $all_artikel }}</h1>
                        <h6 class="m-0 fw-semibold">
                            Artikel
                        </h6>
                    </div>
                    <h1 class="m-0 display-4">
                        <i class="fa-solid fa-newspaper"></i>
                    </h1>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-6 mb-3">
                <div class="bg-warning p-3 text-white rounded-4 d-flex align-items-center justify-content-between">
                    <div class="m-0">
                        <h1 class="m-0 display-4 fw-semibold">{{ $all_buletin }}</h1>
                        <h6 class="m-0 fw-semibold">
                            Buletin
                        </h6>
                    </div>
                    <h1 class="m-0 display-4">
                        <i class="fa-solid fa-file-image"></i>
                    </h1>
                </div>
            </div>

            <div class="col-md-3 col-sm-4 col-6 mb-3">
                <div class="bg-white p-3 rounded-4 d-flex align-items-center justify-content-between">
                    <div class="m-0">
                        <h1 class="m-0 display-4 fw-semibold">{{ $all_info }}</h1>
                        <h6 class="m-0 fw-semibold">
                            Info
                        </h6>
                    </div>
                    <h1 class="m-0 display-4">
                        <i class="fa-solid fa-file-circle-exclamation"></i>
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
