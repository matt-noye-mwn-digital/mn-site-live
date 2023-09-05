@extends('layouts.admin')
@push('page-title')
    Admin {{ $portfolioItem->name }}
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
                        {{ $portfolioItem->name }}
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

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive w-100 d-block d-md-table">
                        <tbody>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>{{ $portfolioItem->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tagline</strong></td>
                            <td>{!! $portfolioItem->tagline !!}</td>
                        </tr>
                        <tr>
                            <td><strong>Slug</strong></td>
                            <td>{{ $portfolioItem->slug }}</td>
                        </tr>
                        <tr>
                            <td><strong>Featured Image</strong></td>
                            <td>
                                <img class="img-fluid" src="{{ Storage::url($portfolioItem->featured_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Services Used:</strong></td>
                            <td>{{ $portfolioItem->services_used }}</td>
                        </tr>
                        @if($portfolioItem->the_brief != NULL)
                            <tr>
                                <td><strong>The Brief</strong></td>
                                <td>{!! $portfolioItem->the_brief !!}</td>
                            </tr>
                        @endif
                        @if($portfolioItem->website_link != NULL)
                            <tr>
                                <td><strong>Website Link</strong></td>
                                <td>{{ $portfolioItem->website_link }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td><strong>Mobile Tablet Desktop Image</strong></td>
                            <td>
                                <img class="img-fluid" src="{{ Storage::url($portfolioItem->mobile_desktop_tablet_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                            </td>
                        </tr>
                        @if($portfolioItem->testimonial_author != NULL)
                            <tr>
                                <td><strong>Testimonial Author</strong></td>
                                <td>{{ $portfolioItem->testimonial_author }}</td>
                            </tr>
                        @endif
                        @if($portfolioItem->testimonial_content != NULL)
                            <tr>
                                <td><strong>Testimonial Content</strong></td>
                                <td>{!! $portfolioItem->testimonial_content !!}</td>
                            </tr>
                        @endif
                        <tr>
                            <td><strong>Created:</strong></td>
                            <td>{{ date('d/m/Y', strtotime($portfolioItem->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Updated:</strong></td>
                            <td>{{ date('d/m/Y', strtotime($portfolioItem->updated_at)) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
