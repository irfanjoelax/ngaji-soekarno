@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column gap-2">
                    <h2 class="m-0 fw-bold">{{ Str::ucfirst($category) }}</h2>
                    <h6 class="m-0 text-muted fw-semibold">Daftar Lengkap Berdasarkan Kategori</h6>
                </div>
            </div>

            <div class="col-12">
                <div class="mt-4 mb-3 d-flex gap-3">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="search" name="keyword" class="form-control"
                                value="{{ $request['keyword'] ?? '' }}" placeholder="Pencarian..">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>


                    <a href="{{ route('post.create', ['category' => $category]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>

                <table class="table table-borderless align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center" width="6%">#</th>
                            <th class="text-center" width="19%">Image</th>
                            <th class="text-start" width="70%">Post</th>
                            <th class="text-center" width="5%"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($posts as $item)
                            <tr>
                                <td class="text-center">
                                    {{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <img src="{{ $item->image == 'post/default.svg' ? asset('img/default.svg') : asset('storage/' . $item->image) }}"
                                        width="150" class="rounded-3" loading="lazy">
                                </td>
                                <td class="text-start">
                                    <h6 class="fw-semibold">{{ $item->title }}</h6>
                                    <small class="text-muted">{{ $item->author }}</small>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('post.edit', ['post' => $item->id, 'category' => $item->category]) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-danger text-center py-2" colspan="6">
                                    Data Tidak Ditemukan atau Masih Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-2">
                    {{ $posts->appends($request)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
