@extends('layouts.admin')
@push('page-title')
    Admin {{ $wid->title }}
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
                        {{ $wid->title }}
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.what-i-do.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All What I Do Items
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive w-100 d-block d-md-table">
                        <tbody>
                            <tr>
                                <td><strong>Title</strong></td>
                                <td>{{ $wid->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Slug</strong></td>
                                <td>{{ $wid->slug }}</td>
                            </tr>
                            <tr>
                                <td><strong>Featured Image</strong></td>
                                <td>
                                    @if($wid->featured_image != NULL)
                                        <img class="img-fluid" src="{{ Storage::url($wid->featured_image) }}" style="display: block; height: 150px; margin-left: 0; width: auto;">
                                    @else
                                        No featured image set
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Created</strong></td>
                                <td>{{ date('d/m/Y', strtotime($wid->created_at)) }}</td>
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
                        <a href="{{ route('admin.what-i-do.edit', $wid->id)}}" class="mediumPurpleBtn">Edit</a>
                        <form action="{{ route('admin.what-i-do.destroy', $wid->id) }}" method="POST">
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
