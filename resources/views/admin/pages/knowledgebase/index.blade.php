@extends('layouts.admin')
@push('page-title')
    Admin All Knowledgebase Articles
@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h1>All Knowledgebase Articles</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.knowledgebase.create') }}" class="darkPurpleBtn">
                        Create new post <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table dataTablesTable table-responsive w-100 d-block d-md-table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Excerpt</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kbArticles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->slug }}</td>
                                <td>{{ $article->category->name }}</td>
                                <td>{{ $article->excerpt }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="{{ route('admin.knowledgebase.show', $article->id) }}">View</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.knowledgebase.edit', $article->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.knowledgebase.destroy', $article->id) }}" method="POST">
                                                <form action="{{ route('admin.knowledgebase.destroy', $article->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="confirm-delete-btn delete-btn" type="submit">Delete</button>
                                                </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
