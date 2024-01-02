@extends('layouts.admin')
@push('page-title')
    Admin Show Personal Project {{ $pp->name }}
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
                    <h1>{{ $pp->name }}</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.personal-projects.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Personal Projects
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
                                <td><strong>Name</strong></td>
                                <td>@if($pp->name){{ $pp->name }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Tagline</strong></td>
                                <td>@if($pp->tagline){{ $pp->tagline }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Slug</strong></td>
                                <td>@if($pp->slug){{ $pp->slug }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Services Used</strong></td>
                                <td>@if($pp->services_used){{ $pp->services_used }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>The Brief</strong></td>
                                <td>@if($pp->the_brief){!! $pp->the_brief !!} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Project Link</strong></td>
                                <td>@if($pp->project_link){{ $pp->project_link }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Featured Image</strong></td>
                                <td>
                                    @if($pp->featured_image)
                                        <img class="img-fluid" src="{{ Storage::url($pp->featured_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                    @else
                                        No featured image set
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Responsive Image</strong></td>
                                <td>
                                    @if($pp->responsive_image)
                                        <img class="img-fluid" src="{{ Storage::url($pp->responsive_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                    @else
                                        No responsive image set
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>SEO Title</strong></td>
                                <td>@if($pp->seo->seo_title){{ $pp->seo->seo_title }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Seo Description</strong></td>
                                <td>@if($pp->seo->seo_description){{ $pp->seo->seo_description }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>SEO Keywords</strong></td>
                                <td>@if($pp->seo->seo_keywords){{ $pp->seo->seo_keywords }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>SEO Canonical URL</strong></td>
                                <td>@if($pp->seo->seo_canonical_url){{ $pp->seo->seo_canonical_url }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>SEO Property Type</strong></td>
                                <td>@if($pp->seo->seo_property_type){{ $pp->seo->seo_property_type }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>SEO Image</strong></td>
                                <td>
                                    @if($pp->seo->seo_image)
                                        <img class="img-fluid" src="{{ Storage::url($pp->seo->seo_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                    @else
                                        No Seo image set
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
