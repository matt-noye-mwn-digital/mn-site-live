@extends('frontend.layouts.main')
@push('page-title')
    {{ $port->name }} Portfolio Item
@endpush
@push('page-description')
    {{ $port->page_description }}
@endpush
@push('page-keywords')
    {{ $port->seo_keywords }}
@endpush
@push('page-styles')
    <style>
        body {
            background-color: #fff;
        }
    </style>
@endpush
@push('page-scripts')

@endpush
@section('content')

    <section class="singlePortfolioItemTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h1>{{ $port->name }}</h1>
                        {!! $port->tagline !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($port->mobile_desktop_tablet_image != NULL)
        <section class="singlePortfolioItemResponsiveImage">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <img class="img-fluid mainImage" src="{{ Storage::url($port->mobile_desktop_tablet_image) }}" alt="{{ $port->name }} responsive image">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="singlePortfolioItemMain">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside>
                        <h2>What I did</h2>
                        <ul class="list-unstyled">
                            @foreach($servicesArray as $service)
                                <li>{{ $service }}</li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-9">
                    <h2 class="sectionTitle">The Brief</h2>
                    {!! $port->the_brief !!}
                </div>

            </div>
        </div>
    </section>


    @if($port->testimonial_content != NULL)
        <section class="singlePortfolioItemTestimonialBanner">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="sectionTitle">What our client said</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="testimonialWrapper">
                            {!! $port->testimonial_content !!}
                            <h5>{{ $port->testimonial_author }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="singlePortfolioItemContactBanner">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h5>Let's start a project together</h5>
                    <div class="btn-group">
                        <a href="" class="btn btn-lg darkPurpleBtn">
                            Contact Me <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="" class="btn bt-lg mediumPurpleBtn">
                            Get A Quote <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
