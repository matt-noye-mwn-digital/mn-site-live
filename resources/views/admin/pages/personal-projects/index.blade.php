@extends('layouts.admin')
@push('page-title')
    Admin All Personal Projects
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
                    <h1>All Personal Projects</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.personal-projects.create') }}" class="darkPurpleBtn">
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
                    <table class="table table-responsive w-100 d-block d-md-table dataTablesTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pp as $pp)
                                <tr>
                                    <td>{{ $pp->name }}</td>
                                    <td>{{ $pp->slug }}</td>
                                    <td>{{ date('d/m/Y', strtotime($pp->created_at)) }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="">View</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.personal-projects.edit', $pp->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="" method="post">
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
