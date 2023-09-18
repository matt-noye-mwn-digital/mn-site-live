@extends('frontend.layouts.main')
@push('page-title')
    {{ $category->name }} Knowledgebase
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
    <section class="resourcesPageTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>Knowledgebase</h5>
                        <h1>{{ $category->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="resourcesPageMain">
        <div class="container">
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-4">
                        <h4>{{ $article->title }}</h4>
                        {!! Str::limit($article->main_content, 50) !!}
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
