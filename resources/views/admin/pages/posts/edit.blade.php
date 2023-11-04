@extends('layouts.admin')
@push('page-title')
    Admin Edit {{ $post->name }} Post
@endpush
@push('page-scripts')
    <script>
        $(document).ready(function(){
            $('#published').change(function(){
                var selectedValue = $(this).val();

                if(selectedValue == 0) {
                    $('#publishSaveBtn').text('Save as draft')
                }
                else {
                    $('#publishSaveBtn').text('Publish')
                }
            })
        });
    </script>
@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h1>Edit {{ $post->name }} Post</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.posts.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Posts
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
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Title *</label>
                                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
                                        @error('title')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" required>
                                        @error('slug')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Content *</label>
                                        <textarea name="main_content" id="main_content" cols="30" rows="10" class="tinyEditor" required>{{ old('main_content', $post->main_content) }}</textarea>
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
                                        <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title') }}">
                                        <x.form-errors fieldName="seo_title"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Canonical URL</label>
                                        <input type="text" name="seo_canonical_url" id="seo_canonical_url">
                                        <x.form-errors fieldName="seo_canonical_url"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Property Type</label>
                                        <select name="seo_property_type" id="seo_property_type">

                                        </select>
                                        <x.form-errors fieldName="seo_property_type"/>
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
                                        <input type="text" name="seo_keyword" id="seo_keyword" value="{{ old('seo_keyword') }}">
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
                                    <div class="col-12">
                                        <label for="">Property Type</label>
                                        <select name="seo_property_type" id="seo_property_type">
                                            <option value="website" selected>Website</option>
                                            <option value="article">Article</option>
                                            <option value="place">Place</option>
                                            <option value="product">Product</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 offset-lg-1">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Category *</label>
                                        <select name="category_id" id="category_id" required>
                                            <option selected disabled>Choose a category</option>
                                            @foreach($category as $category)
                                                <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Featured Image *</label>
                                        <input type="file" name="featured_image" id="featured_image">
                                        @if($post->featured_image)
                                            <img class="img-fluid" src="{{ Storage::url($post->featured_image) }}" style="display: block; height: auto; width: 100%;">
                                        @endif
                                        @error('featured_image')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Status</label>
                                        <select name="published" id="published">
                                            <option selected disabled>Choose a status</option>
                                            <option value="1" @if($post->published == 1) selected @endif>Published</option>
                                            <option value="0" @if($post->published == 0) selected @endif>Save as Draft</option>
                                        </select>
                                        @error('published')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="darkPurpleBtn" id="publishSaveBtn" style="display: block; width: 100%;">
                                            Publish
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
