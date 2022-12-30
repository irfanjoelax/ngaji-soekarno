@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column gap-2">
                    <h2 class="m-0 fw-bold">Information</h2>
                    <h6 class="m-0 text-muted fw-semibold">Update Your Information Website</h6>
                </div>
            </div>

            <div class="col-12 mt-lg-4 mt-md-3 mt-sm-2 mt-2">
                <form action="{{ route('information.store') }}" class="bg-white p-4 shadow-sm rounded-4" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" value="{{ $information->phone }}"
                                required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{ $information->email }}"
                                required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" value="{{ $information->address }}">
                        </div>
                    </div>

                    <div class="row mt-lg-4 mt-3">
                        <div class="col-12 text-lg-end text-md-end text-start">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-regular fa-circle-check"></i>
                                <span class="ms-1">Update</span>
                            </button>
                            @if (url()->previous() !== url()->current())
                                <a href="{{ url()->previous() }}" class="btn btn-warning">
                                    <i class="fa-solid fa-arrow-rotate-left"></i>
                                    <span class="ms-1">Back</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
