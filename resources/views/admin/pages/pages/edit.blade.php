@extends('layouts.admin')
@push('page-title')
    Admin Edit Page
@endpush
@push('page-scripts')
    <script>
        /*$(document).ready(function(){
            $('#published').change(function(){
                var selectedValue = $(this).val();

                if(selectedValue == 0) {
                    $('#publishSaveBtn').text('Save as draft')
                }
                else {
                    $('#publishSaveBtn').text('Publish')
                }
            });
        });*/
    </script>
@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h1>Edit {{ $content->page_title }}</h1>
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
                    <form action="{{ route('admin.pages.update', $content->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Page Title *</label>
                                        <input type="text" name="page_title" id="page_title" value="{{ old('page_title', $content->page_title) }}" required>
                                        <x.form-errors fieldName="page_title"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Page Slug</label>
                                        <div class="input-group pageSlug">
                                            <span class="input-group-text">{{ config('settings.site_url', config('Laravel')) }}</span>
                                            <input type="text" class="form-control" name="page_slug" id="page_slug" value="{{ old('page_slug', $content->page_slug) }}" required>
                                            <x.form-errors fieldName="page_slug"/>
                                        </div>
                                    </div>
                                </div>
                               {{-- <div class="row">
                                    <div class="col-12">
                                        <h2 class="pageFormSecTitle">Banners</h2>
                                        <table class="w-100" id="page-banners">
                                            <tbody>
                                                <tr class="banner block w-100">
                                                    <td class="w-100 block">
                                                        <div class="row w-100 block">
                                                            <div class="col-md-6">
                                                                <label for="">Banner Title</label>
                                                                <input type="text" name="banner[0][banner_title]" id="banner_title">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Banner Template</label>
                                                                <select name="banner[0][banner_template]" id="banner_template">
                                                                    @foreach($pageBannerList as $pbl)
                                                                        <option value="{{ $pbl }}">{{ $pbl }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row w-100">
                                                            <div class="col-12 ps-0">

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>--}}

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
                                        <input type="text" name="seo_keyword" id="seo_keyword" value="{{ old('seo_keyword') }}">
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
                            </div>
                            <div class="col-lg-3 ps-4">
                                <ul class="list-unstyled pageOverallInformationList">
                                    <li>
                                        <strong>Created:</strong>: @if($content->created_at) {{ date('d/m/Y', strtotime($content->created_at)) }} @else -- @endif
                                    </li>
                                    <li>
                                        <strong>Updated:</strong> @if($content->updated_at) {{ date('d/m/Y', strtotime($content->updated_at)) }} @else -- @endif
                                    </li>
                                    <li><strong>Status:</strong> @if($content->published == true)
                                            <span class="text-success" >Published</span>
                                        @else
                                            <span class="text-secondary">Draft</span>
                                        @endif
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="darkPurpleBtn" style="display: block; width: 100%;">
                                            Update
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
