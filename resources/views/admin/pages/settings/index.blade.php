@extends('layouts.admin')
@push('page-title')
    Admin Settings
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
                    <h1>Settings</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="pageMain" id="settingsPageMain">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-bs-toggle="list" role="tab" href="#generalSettings">
                            General Settings
                        </a>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" role="tab" href="#settingsAdminUsers">Admin Users</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="settingsTabContent">
                        <div class="tab-pane fade show active" id="generalSettings" role="tabpanel" >
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h2>General Settings</h2>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.settings.generalSettingsCreate') }}" class="darkPurpleBtn">
                                            Add new General Setting <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('admin.settings.generalUpdate') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">App Name</label>
                                        <input type="text" name="app_name" id="app_name" value="{{ $configurations['app_name'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">App URL</label>
                                        <input type="text" name="app_url" id="app_url" value="{{ $configurations['app_url'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="darkPurpleBtn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show" id="settingsAdminUsers" role="tabpanel" >

                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h2>Admin Users</h2>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-end">
                                        <a href="" class="darkPurpleBtn">
                                            Add new Admin <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-responsive w-100 d-block d-md-table dataTablesTable">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adminUser as $au)
                                        <tr>
                                            <td>{{ $au->id }}</td>
                                            <td>{{ $au->first_name }} {{ $au->last_name }}</td>
                                            <td>{{ $au->email }}</td>
                                            <td>
                                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="">View</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Edit</a>
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
            </div>
        </div>
    </section>

@endsection
