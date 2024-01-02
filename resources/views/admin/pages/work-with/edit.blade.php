@extends('layouts.admin')
@push('page-title')
    Edit {{ $www->title }}
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
                    <h1>Edit {{ $www->title }}</h1>
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
                    <form action="{{ route('admin.who-i-work-with.update', $www->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <label for="">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $www->title) }}" required>
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
                                <textarea name="sub_title" id="sub_title" cols="30" rows="10" class="tinyEditor">{{ old('sub_title', $www->sub_title) }}</textarea>
                                @error('sub_title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Current Featured Image</label>
                                @if($www->featured_image)
                                    <img class="img-fluid" src="{{ Storage::url($www->featured_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                @else
                                    --
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="">Add new featured image</label>
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
                                <textarea name="main_content" id="main_content" cols="30" rows="10" class="tinyEditor">{{ old('main_content', $www->main_content) }}</textarea>
                                @error('main_content')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
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
                                <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title', $www->seo->seo_title) }}">
                                <x.form-errors fieldName="seo_title"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Canonical URL</label>
                                <input type="text" name="seo_canonical_url" id="seo_canonical_url" value="{{ old('seo_canonical_url', $www->seo->seo_canonical_url) }}">
                                <x.form-errors fieldName="seo_canonical_url"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Description</label>
                                <textarea name="seo_description" id="seo_description" cols="30" rows="10">{{ old('seo_description', $www->seo->seo_description) }}</textarea>
                                <x.form-errors fieldName="seo_description"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Keywords</label>
                                <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keyword', $www->seo->seo_keywords) }}">
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
                            <div class="col-md-6">
                                <label for="">SEO Image</label>
                                @if($www->featured_image)
                                    <img class="img-fluid" src="{{ Storage::url($www->seo->seo_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                @else
                                    --
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="">Add new SEO image</label>
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
