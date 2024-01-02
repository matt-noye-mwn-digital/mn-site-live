@extends('layouts.admin')
@push('page-title')
    Admin {{ $article->title }} Knowledgebase Article
@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9"><h1>Edit {{ $article->title }} Knowledgebase Article</h1></div>
                <div class="col-md-3">
                    <a href="{{ route('admin.knowledgebase.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Knowledgebase Articles
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="pageMain mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive w-100">
                        <tbody>
                            <tr>
                                <td><strong>Title:</strong></td>
                                <td>{{ $article->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Slug:</strong></td>
                                <td>{{ $article->slug }}</td>
                            </tr>
                            <tr>
                                <td><strong>Main Content</strong></td>
                                <td>{!! $article->main_content !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    @if($article->published == 0)
                                        Draft
                                    @else
                                        Published
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Page Description:</strong></td>
                                <td>
                                    @if($article->page_description)
                                        {{ $article->page_description }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Page Keywords:</strong></td>
                                <td>
                                    @if($article->page_keywords)
                                        {{ $article->page_keywords }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="pageEditBanner">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <div class="btn-group">
                        <a href="{{ route('admin.knowledgebase.edit', $article->id) }}" class="mediumPurpleBtn">Edit</a>
                        <form action="{{ route('admin.knowledgebase.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="confirm-delete-btn delete-btn" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
