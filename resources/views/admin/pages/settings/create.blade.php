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
                    <h1>Add new setting</h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ route('admin.settings.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All All settings
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-admin-errors-banner/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.settings.generalSettingStore') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Key</label>
                                <input type="text" name="key" id="key" value="{{ old('key') }}">
                                @error('key')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Value</label>
                                <input type="text" name="value" id="value" value="{{ old('value') }}">
                                @error('value')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
