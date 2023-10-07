@extends('layouts.admin')
@push('page-title')

@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1>{{ $www->title }}</h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ route('admin.who-i-work-with.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Who Work withs
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive w-100 d-block d-md-table">
                        <tbody>
                            <tr>
                                <td><strong>Slug</strong></td>
                                <td>{{ config('configurations.app_url', config('app.url')) }}/{{ $www->slug }}</td>
                            </tr>
                            <tr>
                                <td><strong>Title</strong></td>
                                <td>{{ $www->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Sub Title</strong></td>
                                <td>
                                    @if($www->sub_title)
                                        {{ $www->sub_title }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Featured Image</strong></td>
                                <td>
                                    <img class="img-fluid" src="{{ Storage::url($www->featured_image) }}" style="display: block;height: 100px;width:100px;">
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Main Content</strong></td>
                                <td>
                                    @if($www->main_content)
                                        {!! $www->main_content !!}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SEO Title</strong></td>
                                <td>
                                    @if($www->seo_title)
                                        {!! $www->main_content !!}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SEO Description</strong></td>
                                <td>
                                    @if($www->seo_description)
                                        {{ $www->seo_description }}

                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>SEO Image</strong>
                                </td>
                                <td>
                                    @if($www->seo_image)
                                        <img class="img-fluid" src="{{ Storage::url($www->seo_image) }}" style="display: block;height: 100px;width:100px;">
                                    @else
                                        No SEO Image set
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>SEO Canonical URL</strong>
                                </td>
                                <td>
                                    {{ $www->seo_canonical_url }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
