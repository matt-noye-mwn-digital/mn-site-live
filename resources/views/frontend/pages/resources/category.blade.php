@extends('frontend.layouts.main')
@push('page-title')
    {{ $category->name }} Resources
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
                    <div class="col-md-6">
                        <h1>{{ $category->name }}</h1>
                        <p>
                            Keep up to date with the latest industry news, My blog and much more.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="resourcesPageCategoryListBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li>
                            <a href="/resources">All</a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('category.show', $category->slug) }}" class="{{ request()->is('resources/' . $category->slug) ? 'active' : '' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="resourcesPageMain">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card postCard">
                            <a href="{{ route('posts.show', ['category' => strtolower($post->category->name), 'slug' => $post->slug]) }}">
                                <div class="card-header">
                                    @if($post->featured_image)
                                        <img class="img-fluid" src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }} featured image">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h4>{{ $post->title }}</h4>
                                    {!! Str::limit($post->main_content, 120) !!}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
