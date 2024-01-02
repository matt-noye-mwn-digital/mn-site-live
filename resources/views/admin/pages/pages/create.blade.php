@extends('layouts.admin')
@push('page-title')
    Admin Create New Page
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
            });
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
                    <h1>Create Page</h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ route('admin.pages.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Pages
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
                    <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Page Title *</label>
                                        <input type="text" name="page_title" id="page_title" value="{{ old('title') }}" required>
                                        @error('title')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Page Slug</label>
                                        <input type="text" name="page_slug" id="page_slug" value="{{ old('page_slug') }}">
                                        <small>If left blank this will be autopopulated from the title upon saving</small>
                                        @error('page_slug')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Page Template</label>
                                        <select name="page_template" id="page_template">
                                            @foreach($pageTemplateList as $ptf)
                                                <option value="{{ $ptf }}">{{ $ptf }}</option>
                                            @endforeach
                                        </select>
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
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Page Status</label>
                                        <select name="published" id="published" required>
                                            <option selected disabled>-- Select a status -- </option>
                                            <option value="0">Draft</option>
                                            <option value="1">Published</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
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
