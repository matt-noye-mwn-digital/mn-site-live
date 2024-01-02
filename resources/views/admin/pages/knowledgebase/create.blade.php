@extends('layouts.admin')
@push('page-title')
    Admin Create New Knowledgebase Article
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
                    <h1>
                        Create Knowledgebase Article
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.knowledgebase.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Knowledgebase Articles
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
                    <form action="{{ route('admin.knowledgebase.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Title *</label>
                                        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                                        @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Main Content *</label>
                                        <textarea name="main_content" id="main_content" cols="30" rows="10" class="tinyEditor">{{ old('content') }}</textarea>
                                        @error('content')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Page Description</label>
                                        <textarea name="page_description" id="page_description" cols="30" rows="10">{{ old('page_description') }}</textarea>
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
                                        <textarea name="page_keywords" id="page_keywords" cols="30" rows="10">{{ old('page_keywords') }}</textarea>
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
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <label for="">Status</label>
                                        <select name="published" id="published">
                                            <option selected disabled>Choose a status</option>
                                            <option value="1">Published</option>
                                            <option value="0">Save as Draft</option>
                                        </select>
                                        @error('published')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="darkPurpleBtn" id="publishSaveBtn" style="display: block; width: 100%;">
                                            Save
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
