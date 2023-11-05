@extends('layouts.admin')
@push('page-title')
    Admin Edit {{ $portfolioItem->name }} Portfolio Item
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
                        Edit {{ $portfolioItem->name }} Portfolio Item
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

    @if($errors->any())
        <section class="errorsBanner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.portfolio.update', $portfolioItem->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $portfolioItem->name) }}" required>
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
                                <textarea name="tagline" id="tagline" cols="30" rows="10" class="tinyEditor" required>{{ old('tagline', $portfolioItem->tagline) }}</textarea>
                                @error('tagline')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Current Featured Image</label>
                                <img class="img-fluid" src="{{ Storage::url($portfolioItem->featured_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
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
                                <label for="">Services Used *</label>
                                <div class="input-group input-group-inline">
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="wordpress" {{ in_array('wordpress', $servicesUsed) ? 'checked' : '' }}> WordPress
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="WooCommerce" {{ in_array('woocommerce', $servicesUsed) ? 'checked' : '' }}> WooCommerce
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="laravel" {{ in_array('laravel', $servicesUsed) ? 'checked' : '' }}> Laravel
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="aerocommerce" {{ in_array('aerocommerce', $servicesUsed) ? 'checked' : '' }}> Aerocommerce
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="hubspot_cms" {{ in_array('hubspot_cms', $servicesUsed) ? 'checked' : '' }}> HubSpot CMS
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
                                <textarea name="the_brief" id="the_brief" class="tinyEditor" cols="30" rows="10">{{ $portfolioItem->the_brief }}</textarea>
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
                                <input type="text" name="website_link" id="website_link" value="{{ $portfolioItem->website_link }}">
                                @error('website_link')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Current Desktop, Tablet and mobile image</label>
                                <img class="img-fluid" src="{{ Storage::url($portfolioItem->mobile_desktop_tablet_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                            </div>
                            <div class="col-md-6">
                                <label for="">Desktop, Tablet and mobile image upload</label>
                                <input type="file" name="mobile_desktop_tablet_image" id="mobile_desktop_tablet_image" class="singleFileUpload">
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
                                <textarea name="testimonial_content" id="testimonial_content" class="tinyEditor" cols="30" rows="10">{{ old('testimonial_content', $portfolioItem->testimonial_content) }}</textarea>
                                @error('testimonial_content')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Testimonial Author</label>
                                <input type="text" name="testimonial_author" id="testimonial_author" value="{{ $portfolioItem->testimonial_content }}">
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
                                <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title', $portfolioItem->seo->seo_title) }}">
                                <x.form-errors fieldName="seo_title"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Canonical URL</label>
                                <input type="text" name="seo_canonical_url" id="seo_canonical_url" value="{{ old('seo_canonical_url', $portfolioItem->seo->seo_canonical_url) }}">
                                <x.form-errors fieldName="seo_canonical_url"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Description</label>
                                <textarea name="seo_description" id="seo_description" cols="30" rows="10">{{ old('seo_description', $portfolioItem->seo->seo_description) }}</textarea>
                                <x.form-errors fieldName="seo_description"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">SEO Keywords</label>
                                <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keyword', $portfolioItem->seo->seo_keywords) }}">
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
                                <img class="img-fluid" src="{{ Storage::url($portfolioItem->seo->seo_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                            </div>
                            <div class="col-md-6">
                                <label for="">SEO Image</label>
                                <input type="file" name="seo_image" id="seo_image" class="singleFileUpload">
                                @error('seo_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
