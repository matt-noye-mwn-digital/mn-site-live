@extends('frontend.layouts.main')
@push('page-title')

@endpush
@push('page-description')

@endpush
@push('page-keywords')

@endpush
@push('page-styles')

@endpush
@push('page-scripts')

@endpush
@section('content')
    <section id="portfolioPageTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>My Portfolio</h1>
                        <p>
                            Take a look of some of the projects I've worked on in the past that have helped deliver amazing results.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolioPageMain">
        <div class="container">
            <div class="row">
                @foreach($portfolioItems as $portfolioItem)
                    <div class="col-md-6">
                        <div class="portItem">
                            <a href="/portfolio/{{ $portfolioItem->slug }}">
                                <div class="content">
                                    <h5>the title</h5>
                                    <p>tagline</p>
                                </div>
                                <img class="img-fluid mainImage" src="{{ asset('images/Exelby-service.png') }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
