@extends('frontend.layouts.main')
@push('page-title')
    {{ $article->title }} Knowledgebase Article
@endpush
@push('page-description')
    {!! Str::limit($article->main_content, 200) !!}
@endpush
@push('page-keywords')

@endpush
@push('page-styles')

@endpush
@push('page-scripts')

@endpush
@section('content')
    <section class="knowledgebasePageTop">
        <img class="mainBgImage" src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>Knowledgebase</h5>
                        <h1>{{ $article->title }}</h1>
                        <a href="/knowledgebase" class="backToKnowledgebase"><i class="fas fa-chevron-left"></i> Back to knowledgebase</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{ Breadcrumbs::render() }}

    <section class="knowledgebasePageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>
@endsection
