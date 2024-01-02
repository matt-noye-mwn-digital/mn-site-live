@extends('layouts.admin')
@push('page-title')
    Admin Create Personal Project
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
                    <h1>Create Personal Project</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.personal-projects.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Personal Projects
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
                    <form action="{{ route('admin.personal-projects.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name')  }}" required>
                                <x.form-errors fieldName="name"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Tagline</label>
                                <input type="text" name="tagline" id="tagline" value="{{ old('tagline') }}">
                                <x.form-errors fieldName="tagline"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Featured Image Upload *</label>
                                <input type="file" name="featured_image" id="featured_image" required>
                                <x.form-errors fieldName="featured_image"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Services Used</label>
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
                                <x.form-errors fieldName="services_used"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">The Brief</label>
                                <textarea name="the_brief" id="the_brief" cols="30" rows="10" class="tinyEditor">{{ old('the_brief') }}</textarea>
                                <x.form-errors fieldName="the_brief"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Project Link</label>
                                <input type="text" name="project_link" id="project_link" value='{{ old('project_link') }}'>
                                <x.form-errors fieldName="project_link"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Responsive Image</label>
                                <input type="file" name="responsive_image" id="responsive_image">
                                <x.form-errors fieldName="responsive_image"/>
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
                                    <option value="website" selected>Website</option>
                                    <option value="article">Article</option>
                                    <option value="place">Place</option>
                                    <option value="product">Product</option>
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
                                <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keyword') }}">
                                <x.form-errors fieldName="seo_keywords"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
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
