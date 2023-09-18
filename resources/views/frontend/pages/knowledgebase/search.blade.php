@extends('layouts.frontend')
@push('page-title')
    Knowledgebase Search Results
@endpush
@section('content')
    <section class="knowledgebasePageTop">
        <img class="mainBgImage" src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>Knowledgebase</h5>
                        <h1 style="font-size: 3rem;">Search results for: {{ $query }}</h1>
                        <a href="/knowledgebase" class="backToKnowledgebase"><i class="fas fa-chevron-left"></i> Back to knowledgebase</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="knowledgebasePageMain">
        <div class="container">
            <div class="row">
                @if($results->isEmpty())
                    <div class="col-12">
                        <h2>No results found for {{ $query }}</h2>
                    </div>
                @endif
                @foreach($results as $result)
                    <div class="col-md-4">
                        <div class="articleItem">
                            <a href="{{ config('settiongs.site_url') }}/knowledgebase/{{ $result->category->slug }}/{{ $result->slug }}">
                                <h4>{{ $result->title }}</h4>
                                {!! Str::limit($result->main_content, 50) !!}
                                <div class="pageBtn">
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
