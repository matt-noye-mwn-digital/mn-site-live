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
                                    <div class="col-12">
                                        <label for="">Page Description</label>
                                        <textarea name="page_description" id="page_description" cols="30" rows="10">{{ old('page_description', $post->description) }}</textarea>
                                        @error('page_description')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Page Keywords</label>
                                        <textarea name="page_keywords" id="page_keywords" cols="30" rows="10">{{ old('page_keywords', $post->keywords) }}</textarea>
                                        @error('page_keywords')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
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
                                        <label for="">Tags</label>
                                        <div class="tagsWrapper">
                                            @foreach($tags as $tag)
                                                <label for="">
                                                    <input type="checkbox" name="tag[]" id="{{ $tag->name }}" value="{{ $tag->id }}"
                                                           @if(in_array($tag->id, $post->tags ?? [])) checked @endif>
                                                    {{ $tag->name }}
                                                </label>
                                            @endforeach
                                        </div>
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
