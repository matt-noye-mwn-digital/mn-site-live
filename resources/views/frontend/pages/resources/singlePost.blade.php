@extends('frontend.layouts.main')
@push('page-title')
    {{ $post->title }}
@endpush
@push('page-description')
    {{ $post->page_description }}
@endpush
@push('page-keywords')
    {{ $post->page_keywords }}
@endpush
@push('page-styles')

@endpush
@push('page-scripts')

@endpush
@section('content')
    <section class="singlePostTop">
        <img class="mainBgImage" src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ config('configurations.app_url', config('app.url')) }}/resources" class="backAll"><i class="fas fa-chevron-left"></i> Back to all Resources</a>
                        <h1>{{ $post->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="singlePostMain">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    {!! $post->main_content !!}
                </div>
                <div class="col-lg-3">
                    <aside>
                        <div class="item">
                            <h5>Category</h5>
                            <div class="catWrap">
                                <div class="cat">
                                    {{ $post->category->name }}
                                </div>
                            </div>
                        </div>
                        {{--<div class="item">
                            <h5>Tags</h5>
                            <div class="tagWrap">
                                @foreach($tagNames as $tagName)
                                    <div class="tag">
                                        {{ $tagName }}
                                    </div>
                                @endforeach
                            </div>
                        </div>--}}
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
