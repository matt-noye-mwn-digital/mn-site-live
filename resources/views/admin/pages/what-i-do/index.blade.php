@extends('layouts.admin')
@push('page-title')
    Admin All What I Do Items
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
                        All What I Do Items
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.what-i-do.create') }}" class="darkPurpleBtn">
                        Create new item <i class="fas fa-plus"></i>
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
                            <th>ID</th>
                            <th>title</th>
                            <th>Slug</th>
                            <th>Order</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wid as $wid)
                            <tr>
                                <td>{{ $wid->id }}</td>
                                <td>{{ $wid->title }}</td>
                                <td>{{ $wid->slug }}</td>
                                <td>{{ $wid->order }}</td>
                                <td>{{ date('d/m/Y', strtotime($wid->created_at)) }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="{{ route('admin.what-i-do.show', $wid->id) }}">View</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.what-i-do.edit', $wid->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.what-i-do.destroy', $wid->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="confirm-delete-btn" type="submit">Delete</button>
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
