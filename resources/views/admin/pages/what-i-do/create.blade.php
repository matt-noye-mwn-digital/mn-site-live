@extends('layouts.admin')
@push('page-title')
    Admin Create What I Do Item
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
                        Create What I Do Item
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.what-i-do.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All What I Do Items
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
                    <form action="{{ route('admin.what-i-do.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Order *</label>
                                <input type="number" name="order" id="order" value="{{ old('order') }}" required>
                                @error('order')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Featured Image *</label>
                                <input type="file" name="featured_image" id="featured_image" required>
                                @error('featured_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Main Content *</label>
                                <textarea name="main_content" id="main_content" cols="30" rows="10" class="tinyEditor">{{ old('main_content') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
