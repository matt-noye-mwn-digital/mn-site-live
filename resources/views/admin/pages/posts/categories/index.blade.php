@extends('layouts.admin')
@push('page-title')
    Admin All Post Categories
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
                        All Post Categories
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.post-categories.create') }}" class="darkPurpleBtn">
                        Create new Cateogry <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table dataTablesTable table-responsive w-100 d-block d-md-table dataTablesTable ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($postCategories as $postc)
                            <tr>
                                <td>{{ $postc->name }}</td>
                                <td>{{ $postc->slug }}</td>
                                <td>{{ date('d/m/Y', strtotime($postc->created_at)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($postc->updated_at)) }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="{{ route('admin.post-categories.show', $postc->id) }}">View</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.post-categories.edit', $postc->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.post-categories.destroy', $postc->id) }}" method="POST">
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
