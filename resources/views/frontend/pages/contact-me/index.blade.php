@extends('layouts.frontend')
@push('page-title')
    Contact Me
@endpush
@push('page-description')

@endpush
@push('page-keywords')

@endpush
@push('page-styles')

@endpush
@push('page-scripts')

@endpush
@section('content')
    <section class="contactPageTop">
        <img src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}" alt="" class="mainBgImage">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Get in touch with me</h1>
                        <p>
                            Are you looking to start a project?  Please use one of the following methods below to get in touch with me.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contactPageOverviewBanner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="item">
                        <h5>Form.</h5>
                        <a class="smoothScroll" href="#contactPageContactFormBanner">Take me to the form <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <h5>Quote.</h5>
                        <a href="">Get a quote <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <h5>Email.</h5>
                        <a href="mailtohello@matt-noye.co.uk">hello@matt-noye.co.uk <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <h5>Call.</h5>
                        <a href="">
                            01325 238 115 <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section id="contactPageContactFormBanner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="formWrap">
                        <form id="biscolab-recaptcha-invisible-form" action="{{ route('contact-me.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">First Name *</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name *</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Email Address *</label>
                                    <input type="email" name="email_address" id="email_address" value="{{ old('email_address') }}" required>
                                    @error('email_address')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Company Name <small>optional</small></label>
                                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}">
                                    @error('company_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label for="">Reason for contacting *</label>
                                    <select name="reason_for_contacting" id="reason_for_contacting" required>
                                        <option selected disabled>-- Select a reason --</option>
                                        <option value="general_enquiry">General Enquiry</option>
                                        <option value="web_development_enquiry">Web Development Enquiry</option>
                                        <option value="web_hosting_enquiry">Web Hosting Enquiry</option>
                                        <option value="work_with_me_enquiry">Work with me enquiry</option>
                                        <option value="other">Other</option>
                                    </select>
                                    @error('reason_for_contacting')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Your Message *</label>
                                    <textarea name="your_message" id="your_message" cols="30" rows="10">{{ old('your_message') }}</textarea>
                                    @error('your_message')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">How did you hear about me?</label>
                                    <input type="text" name="how_did_you_hear_about_me" id="how_did_you_hear_about_me" value="{{ old('how_did_you_hear_about_me') }}">
                                    @error('how_did_you_hear_about_me')
                                        <div class="text-danger">
                                            {{ $error }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="darkPurpleBtn">
                                        Send Message <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
