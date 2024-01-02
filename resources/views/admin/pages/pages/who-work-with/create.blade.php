@extends('layouts.admin')
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Who I Work With Page</h1>
                </div>
            </div>
        </div>
    </section>

    <x-admin-errors-banner/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
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
                                        <label for="">Sub-title</label>
                                        <textarea name="sub_title" id="sub_title" cols="30" rows="10" class="tinyEditor"></textarea>
                                        @error('sub_title')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Page Main Content</label>
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
                                        <label for="">SEO Title</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">SEO Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">SEO Keywords</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 offset-lg-1">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Featured Image *</label>
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
