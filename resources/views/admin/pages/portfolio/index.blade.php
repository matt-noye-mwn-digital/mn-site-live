@extends('layouts.admin')
@push('page-title')
    Admin All Portfolio Items
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
                        All Portfolio Items
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.portfolio.create') }}" class="darkPurpleBtn">
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
                    <table class="table table-responsive w-100 d-block d-md-table dataTablesTable ">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolioItems as $pi)
                                <tr>
                                    <td>{{ $pi->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($pi->created_at)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($pi->updated_at)) }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('admin.portfolio.show', $pi->id) }}">View</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.portfolio.edit', $pi->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('admin.portfolio.destroy', $pi->id) }}" method="post">
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
