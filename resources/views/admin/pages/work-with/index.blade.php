@extends('layouts.admin')
@push('page-title')
    Admin Who I Work With
@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1>All Who I Work with</h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ route('admin.who-i-work-with.create') }}" class="darkPurpleBtn">
                        Create new who I work with <i class="fas fa-plus"></i>
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
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($www as $www)
                                <tr>
                                    <td>{{ $www->title }}</td>
                                    <td>{{ $www->slug }}</td>
                                    <td>{{ date('d/m/Y', strtotime($www->created_at)) }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('admin.who-i-work-with.show', $www->id) }}">View</a>
                                            </li>
                                            <li>
                                                <a href="">Edit</a>
                                            </li>
                                            <li>
                                                <form action="" method="POST">
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
