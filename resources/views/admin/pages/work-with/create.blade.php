@extends('layouts.admin')
@push('page-title')

@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1>Create new Who I Work With</h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ route('admin.who-i-work-with.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Who Work withs
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
                    <form action="{{ route('admin.who-i-work-with.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Title</label>
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
                                <label for="">Sub Title</label>
                                <textarea name="sub_title" id="sub_title" cols="30" rows="10" class="tinyEditor">{{ old('sub_title') }}</textarea>
                                @error('sub_title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Featured Image</label>
                                <input type="file" name="featured_image" id="featured_image">
                                @error('featured_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Main Content</label>
                                <textarea name="main_content" id="main_content" cols="30" rows="10" class="tinyEditor">{{ old('main_content') }}</textarea>
                                @error('main_content')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>SEO</h2>
                                <hr>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Title</label>
                                <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title') }}">
                                @error('seo_title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Description</label>
                                <textarea name="seo_description" id="seo_description" cols="30" rows="10">{{ old('seo_description') }}</textarea>
                                @error('seo_description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Image</label>
                                <input type="file" name="seo_image" id="seo_image">
                                @error('seo_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn" id="publishSaveBtn" >
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
