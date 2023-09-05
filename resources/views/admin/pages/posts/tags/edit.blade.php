@extends('layouts.admin')
@push('page-title')
    Admin Edit {{ $tag->name }} Post Tag
@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h1>
                        Edit {{ $tag->name }} Post Tag
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.post-tags.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Post Tags
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-admin-errors-banner/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.post-tags.update', $tag->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}" required>
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor">{{ old('description', $tag->description) }}</textarea>
                                @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
