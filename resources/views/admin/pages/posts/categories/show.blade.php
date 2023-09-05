@extends('layouts.admin')
@push('page-title')
    Admin {{ $postCategory->name }}
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
                    <h1>{{ $postCategory->name }}</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.post-categories.index') }}" class="darkPurpleBtn"><i class="fas fa-chevron-left"></i> All Categories</a>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive w-100 d-block d-md-table">
                        <tbody>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{ $postCategory->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>
                                    @if($postCategory->description)
                                        {!! $postCategory->description !!}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Featured Image</strong></td>
                                <td>
                                    @if($postCategory->featured_image)
                                        <img class="img-fluid" src="{{ Storage::url($postCategory->featured_image) }}" style="display: block; height: 100px; width: auto;">
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

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Related Posts</h2>
                    @if($posts->isEmpty())
                        <p>No posts found.</p>
                    @else
                        <ul>
                            @foreach($posts as $post)
                                <li>{{ $post->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="pageEditBanner">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <div class="btn-group">
                        <a href="{{ route('admin.post-categories.edit', $postCategory->id) }}" class="mediumPurpleBtn">Edit</a>
                        <form action="{{ route('admin.post-categories.destroy', $postCategory->id) }}" method="POST">
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
