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
    <section class="knowledgebasePageTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>Knowledgebase</h5>
                        <h1>{{ $category->name }}</h1>
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
                    <div class="searchFormWrap">
                        <form action="{{ route('knowledgebase.search') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="query" id="query" class="form-control" placeholder="Search the knowledgebase">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-4">
                        <div class="articleItem">
                            <a href="{{ config('settings.site_url') }}/knowledgebase/{{ $article->category->slug }}/{{ $article->slug }}">
                                <h4>{{ $article->title }}</h4>
                                {!! Str::limit($article->main_content, 50) !!}
                                <div class="pageBtn">
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                            </a>
                        </div>
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
