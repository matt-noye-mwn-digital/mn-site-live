@extends('layouts.admin')
@push('page-title')
    Admin Create Homepage
@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <h1>Create Homepage</h1>
                </div>
            </div>
        </div>
    </section>

    <x-admin-errors-banner/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.homepage.store') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <h4 class="pageFormSecTitle">
                                    Hero Banner
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Main Title</label>
                                <input type="text" name="hero_main_title" id="hero_main_title" required>
                                @error('hero_main_title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Type writer static text</label>
                                <input type="text" name="typewriter_static_text" id="typewriter_static_text" required>
                                @error('typewriter_static_text')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Typewriter main text</label>
                                <textarea name="typewriter_main_text" id="typewriter_main_text" cols="30" rows="10" required></textarea>
                                @error('typewriter_main_text')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Button one</label>
                                <input type="text" name="hero_button_one_text" id="hero_button_one_text" placeholder="Button one text" required>
                                <input type="text" name="hero_button_one_link" id="hero_button_one_link" placeholder="Button one link" required>
                                @error('hero_button_one_text')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('hero_button_one_link')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Button two</label>
                                <input type="text" name="hero_button_two_text" id="hero_button_two_text" placeholder="Button two text" required>
                                <input type="text" name="hero_button_two_link" id="hero_button_two_link" placeholder="Button two link" required>
                                @error('hero_button_two_text')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('hero_button_two_link')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="pageHr">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="pageFormSecTitle">
                                    About banner
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Main title</label>
                                <input type="text" name="about_banner_main_title" id="about_banner_main_title">
                                @error('about_banner_main_title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Content</label>
                                <textarea name="about_banner_content" id="about_banner_content" cols="30" rows="10" class="tinyEditor"></textarea>
                                @error('about_banner_content')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Image</label>
                                <input type="file" name="about_banner_image" id="about_banner_image">
                                @error('about_banner_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">My Skills</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">Tools I use</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">
                                    Publish
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
