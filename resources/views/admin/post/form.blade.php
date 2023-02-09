@extends('layouts.app')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Content Post',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['help']]
            ]
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column gap-2">
                    <h2 class="m-0 fw-bold">{{ Str::ucfirst($category) }}</h2>
                    <h6 class="m-0 text-muted fw-semibold">Form Input Data Post {{ Str::ucfirst($category) }}</h6>
                </div>
            </div>

            <div class="col-12 mt-lg-4 mt-md-3 mt-sm-2 mt-2">
                @if ($errors->any())
                    <div class="alert alert-warning mb-3" role="alert">
                        <ul class="my-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $url }}" class="bg-white p-4 shadow-sm rounded-4" method="POST"
                    enctype="multipart/form-data">
                    @csrf @if ($isEdit)
                        @method('PUT')
                    @endif

                    <div class="row mb-lg-4 mb-md-3 mb-2">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="title" placeholder="Masukkan Title Post"
                                value="{{ $isEdit ? $data->title : old('title') }}" autofocus required>
                        </div>
                    </div>

                    <div class="row mb-lg-4 mb-md-3 mb-2">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="author" placeholder="Masukkan Penulis"
                                value="{{ $isEdit ? $data->author : old('author') }}" autofocus required>
                        </div>
                    </div>

                    <div class="row mb-lg-4 mb-md-3 mb-2">
                        <div class="col-sm-12">
                            <small class="text-muted">Image For Your Post</small>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>

                    <div class="row mb-lg-4 mb-md-3 mb-2">
                        <div class="col-sm-12">
                            <textarea name="content" class="form-control summernote" placeholder="Masukkan Title Post" required>{{ $isEdit ? $data->content : '' }}</textarea>
                        </div>
                    </div>

                    @if ($category == 'buletin')
                        <div class="row mb-lg-4 mb-md-3 mb-2">
                            <div class="col-sm-12">
                                <small class="text-muted">
                                    File for User Download
                                    <span class="text-primary">(doc/docx/pdf)</span>
                                </small>
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                    @endif

                    <div class="row mt-lg-4 mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-regular
                                fa-circle-check"></i>
                                <span class="ms-1">{{ $isEdit ? 'Update' : 'Save' }}</span>
                            </button>
                            <a href="{{ route('post.index', ['category' => $category]) }}" class="btn btn-outline-primary">
                                <i class="fa-solid fa-arrow-rotate-left"></i>
                                <span class="ms-1">Back</span>
                            </a>
                            @if ($isEdit)
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    <i class="fa-solid fa-xmark"></i>
                                    <span class="ms-1">Delete</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($isEdit)
        <x-modal-confirm id="deleteModal" text="Are you sure for delete this data ?"
            url="{{ route('post.destroy', ['post' => $data->id, 'category' => $category]) }}" method="DELETE" />
    @endif
@endsection
