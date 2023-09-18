@extends('frontend.layouts.main')
@push('page-title')
    {{--{{ $port->name }} Portfolio Item--}}
@endpush
@push('page-description')
    {{--{{ $port->page_description }}--}}
@endpush
@push('page-keywords')
    {{--{{ $port->seo_keywords }}--}}
@endpush
@push('page-styles')

@endpush
@push('page-scripts')

@endpush
@section('content')
    <section class="singleWidTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h1>{{ $wid->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="singleWidMain">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    {!! $wid->main_content !!}
                </div>
            </div>
        </div>
    </section>
@endsection
