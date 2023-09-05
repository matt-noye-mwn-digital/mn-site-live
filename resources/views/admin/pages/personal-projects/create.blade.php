@extends('layouts.admin')
@push('page-title')
    Admin Create Personal Project
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
                    <h1>Create Personal Project</h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.personal-projects.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Personal Projects
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
                    <form action="{{ route('admin.personal-projects.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name')  }}" required>
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Tagline</label>
                                <input type="text" name="tagline" id="tagline" value="{{ old('tagline') }}">
                                @error('tagline')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Featured Image Upload *</label>
                                <input type="file" name="featured_image" id="featured_image" required>
                                @error('featured_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Services Used</label>
                                <div class="input-group input-group-inline">
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="wordpress"> WordPress
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="WooCommerce"> WooCommerce
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="laravel"> Laravel
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="aerocommerce"> Aerocommerce
                                    </label>
                                    <label for="">
                                        <input type="checkbox" name="services_used[]" id="" value="hubspot_cms"> HubSpot CMS
                                    </label>
                                </div>
                                @error('services_used')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">The Brief</label>
                                <textarea name="the_brief" id="the_brief" cols="30" rows="10" class="tinyEditor">{{ old('the_brief') }}</textarea>
                                @error('the_brief')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Project Link</label>
                                <input type="text" name="project_link" id="project_link" value='{{ old('project_link') }}'>
                                @error('project_link')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Responsive Image</label>
                                <input type="file" name="responsive_image" id="responsive_image">
                                @error('responsive_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
