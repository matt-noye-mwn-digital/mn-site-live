@extends('layouts.admin')
@push('page-title')
    View {{ $content->title }}
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
                    <h1>{{ $content->title }}</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.posts.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Posts
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table w-100">
                        <tbody>
                            <tr>
                                <td><strong>Title</strong></td>
                                <td>{{ $content->title }}</td>
                            </tr>
                            <tr>
                                <td><Strong>Content</Strong></td>
                                <td>{!! $content->main_content !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Category</strong></td>
                                <td>{{ $content->category->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>
                                    @if($content->published == 1)
                                        Published
                                    @else
                                        Unpublished
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Featured Image</strong></td>
                                <td>
                                    @if($content->featured_image)
                                        <img class="img-fluid" src="{{ Storage::url($content->featured_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                    @else
                                        No featured image set
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SEO Title</strong></td>
                                <td>
                                    @if($content->seo->seo_title)
                                        {{ $content->seo->seo_title }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SEO Canonical URL</strong></td>
                                <td>
                                    @if($content->seo->seo_canonical_url)
                                        {{ $content->seo->seo_canonical_url }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SEO Description</strong></td>
                                <td>
                                    @if($content->seo->seo_description)
                                        {{ $content->seo->seo_description }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SEO Keywords</strong></td>
                                <td>
                                    @if($content->seo->seo_keywords)
                                        {{ $content->seo->seo_keywords }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SEO Image</strong></td>
                                <td>
                                    @if($content->seo->seo_image)
                                        <img class="img-fluid" src="{{ Storage::url($content->seo->seo_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                    @else
                                        No seo image set
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
