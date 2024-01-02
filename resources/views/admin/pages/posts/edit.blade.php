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
                            <div class="col-12">
                                <label for="">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
                                <x.form-errors fieldName="title"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Content *</label>
                                <textarea name="main_content" id="main_content" cols="30" rows="10" class="tinyEditor">{{ old('main_content', $post->main_content) }}</textarea>
                                <x.form-errors fieldName="main_content"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Category *</label>
                                <select name="category_id" id="category_id" required>
                                    <option selected disabled>-- Choose a category --</option>
                                    @foreach($category as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="category_id"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Status *</label>
                                <select name="published" id="published">
                                    <option value="1" @if($post->published == 1) selected @endif>Published</option>
                                    <option value="0" @if($post->published == 0) selected @endif>Unpublished</option>
                                </select>
                                <x.form-errors fieldName="published"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Featured Image *</label>
                                <input type="file" name="featured_image" id="featured_image">
                                <x.form-errors fieldName="featured_image"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Current Featured image</label>
                                @if($post->featured_image)
                                    <img class="img-fluid" src="{{ Storage::url($post->featured_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                @else
                                    No featured image set
                                @endif
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
                                <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title', $post->seo->seo_title) }}">
                                <x.form-errors fieldName="seo_title"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Canonical URL</label>
                                <input type="text" name="seo_canonical_url" id="seo_canonical_url" value="{{ old('seo_canonical_url', $post->seo->seo_canonical_url) }}">
                                <x.form-errors fieldName="seo_canonical_url"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Description</label>
                                <textarea name="seo_description" id="seo_description" cols="30" rows="10">{{ old('seo_description', $post->seo->seo_description) }}</textarea>
                                <x.form-errors fieldName="seo_description"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Keywords</label>
                                <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keyword', $post->seo->seo_keywords) }}">
                                @error('seo_keyword')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Current SEO Image</label>
                                @if($post->seo->seo_image == NULL)
                                    No SEO image set
                                @else
                                    <img class="img-fluid" src="{{ Storage::url($post->seo->seo_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="">SEO Image</label>
                                <input type="file" name="seo_image" id="seo_image">
                                <x.form-errors fieldName="seo_image"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
