@extends('layouts.admin')
@push('page-title')
    Admin {{ $category->name }} Knowledgebase Category
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
                    <h1>
                        {{ $category->name }} Knowledgebase Category
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.knowledgebase-categories.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Post Categories
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
                                <td><strong>Name:</strong></td>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Slug</strong></td>
                                <td>{{ $category->slug }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>
                                    @if($category->description)
                                        {!! $category->description !!}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Featured Image</strong></td>
                                <td>
                                    @if($category->featured_image)
                                        <img class="img-fluid" src="{{ Storage::url($category->featured_image) }}" style="display: block; height: 100px; width: auto;">
                                    @else
                                        No featured image currently set
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
                        <a href="{{ route('admin.knowledgebase-categories.edit', $category->id) }}" class="mediumPurpleBtn">Edit</a>
                        <form action="{{ route('admin.knowledgebase-categories.destroy', $category->id) }}" method="POST">
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
