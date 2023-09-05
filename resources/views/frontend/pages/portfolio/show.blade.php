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
                    <div class="col-lg-7">
                        <h1>{{ $port->name }}</h1>
                        {!! $port->tagline !!}
                    </div>
                    <div class="col-lg-5">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="singlePortfolioItemMain">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    {!! $port->the_brief !!}
                </div>
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
            </div>
        </div>
    </section>


    <section class="singlePortfolioItemTestimonialBanner">
        <div class="container">
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

@endsection
