@extends('layouts.admin')
@push('page-title')
    Admin All Pages
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
                    <h1>All Pages</h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ route('admin.pages.create') }}" class="darkPurpleBtn">
                        Create new page <i class="fas fa-plus"></i>
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
                            <th>Page Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->page_title }}</td>
                                    <td>{{ $page->page_slug }}</td>
                                    <td>
                                        @if($page->published == true)
                                            <div class="text-success" >Published</div>
                                        @else
                                            <div class="text-secondary">Draft</div>
                                        @endif
                                    </td>
                                    <td>{{ date('d/m/Y H:i', strtotime($page->created_at)) }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="">View</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.pages.edit', $page->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="confirm-delete-btn delete-btn" type="submit">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
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
