@extends('layouts.frontend')
@push('page-title')
    Knowledgebase
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
        <img class="mainBgImage" src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Knowledgebase</h1>
                        <p>
                            Some content here
                        </p>
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
                <div class="col-12">
                    <h2 class="sectionTitle">Categories</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="knowledgebase/{{ $category->slug }}">
                                    {{ $category->name }} <span class="articleCount">({{ $categoryCounts[$category->id] }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
