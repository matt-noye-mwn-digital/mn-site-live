@extends('layouts.frontend')
@push('page-title')
    Who I Work With
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
    <section id="whoWorkWithMainPageTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Who I Work With</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="whoWorkWithMainPageMain">
        <div class="container">
            <div class="row">
                @foreach($www as $www)
                    <div class="col-md-6">
                        <div class="wwwItem">
                            <a href="{{ route('who-work-with.show', ['slug' => $www->slug]) }}">
                                <img class="img-fluid" src="{{ Storage::url($www->featured_image) }}">
                                <div class="content">
                                    <h4>{{ $www->title }} <i class="fa-solid fa-arrow-right-long"></i></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
