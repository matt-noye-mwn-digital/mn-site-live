@extends('layouts.frontend')
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
    <section class="singleWhoWorkWithTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ config('configurations.app_url', config('app.url')) }}/resources" class="backAll"><i class="fas fa-chevron-left"></i> Back to all Who I Work With</a>
                        <h1>{{ $www->title }}</h1>
                        {!! $www->sub_title !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="singleWhoWorkWithMain">
        <div class="container">

        </div>
    </section>
@endsection
