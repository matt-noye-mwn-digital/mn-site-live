@extends('layouts.admin')
@push('page-title')
    Admin Create Portfolio Item
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
                        Create Portfolio Item
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.portfolio.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Portfolio Items
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
                    <form action="{{ route('admin.portfolio.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Tagline *</label>
                                <textarea name="tagline" id="tagline" cols="30" rows="10" class="tinyEditor" required>{{ old('tagline') }}</textarea>
                                @error('tagline')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Featured Image Upload *</label>
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
                                <label for="">Services Used *</label>
                                <div class="input-group input-group-inline">
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="wordpress"> WordPress
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="WooCommerce"> WooCommerce
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="laravel"> Laravel
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="aerocommerce"> Aerocommerce
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="hubspot_cms"> HubSpot CMS
                                    </label>
                                </div>
                                @error('services_used')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">The Brief</label>
                                <textarea name="the_brief" id="the_brief" class="tinyEditor" cols="30" rows="10"></textarea>
                                @error('the_brief')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Website Link</label>
                                <input type="text" name="website_link" id="website_link">
                                @error('website_link')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Desktop, Tablet and mobile image upload *</label>
                                <input type="file" name="mobile_desktop_tablet_image" id="mobile_desktop_tablet_image" class="singleFileUpload" required>
                                @error('mobile_desktop_tablet_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Testimonial Content</label>
                                <textarea name="testimonial_content" id="testimonial_content" class="tinyEditor" cols="30" rows="10">{{ old('testimonial_content') }}</textarea>
                                @error('testimonial_content')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Testimonial Author</label>
                                <input type="text" name="testimonial_author" id="testimonial_author">
                                @error('testimonial_author')
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
                                <button type="submit" class="darkPurpleBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
