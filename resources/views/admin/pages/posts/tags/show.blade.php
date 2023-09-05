@extends('layouts.admin')
@push('page-title')
    Admin {{ $tag->name }} Post Tag
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
                    <h1>{{ $tag->name }}</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.post-tags.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Tags
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table-responsive w-100 d-block d-md-block">
                        <tbody>
                            <tr>
                                <td><strong>Name: </strong></td>
                                <td>{{ $tag->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Slug</strong></td>
                                <td>{{ $tag->slug }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>
                                    @if($tag->description)
                                        {!! $tag->description !!}
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
                        <a href="{{ route('admin.post-tags.edit', $tag->id) }}" class="mediumPurpleBtn">Edit</a>
                        <form action="{{ route('admin.post-tags.destroy', $tag->id) }}" method="post">
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
