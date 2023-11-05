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
                            <div class="col-12 mt-5">
                                <hr>
                                <h2 class="pageFormSecTitle">
                                    SEO
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Title</label>
                                <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title') }}">
                                <x.form-errors fieldName="seo_title"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Canonical URL</label>
                                <input type="text" name="seo_canonical_url" id="seo_canonical_url">
                                <x.form-errors fieldName="seo_canonical_url"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Description</label>
                                <textarea name="seo_description" id="seo_description" cols="30" rows="10">{{ old('seo_description') }}</textarea>
                                <x.form-errors fieldName="seo_description"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Keywords</label>
                                <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keyword') }}">
                                @error('seo_keyword')
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
