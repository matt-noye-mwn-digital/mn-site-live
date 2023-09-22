@extends('frontend.layouts.main')
@push('page-title')

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
    <section class="getQuotePageTop">
        <img class="mainBgImage" src="{{ asset('images/backgrounds/purple-blocks-bg-1.png') }}">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            Get a Quote
                        </h1>
                        <p>
                            Some content here
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--{{ Breadcrumbs::render() }}--}}

    <section class="getQuotePageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="mainLabel">What best describes you? *</label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="describe_you" id="option1" value="individual_or_startup">
                                        <label for="">Individual or startup</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="describe_you" id="option1" value="company">
                                        <label for="">Company</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="describe_you" id="option1" value="agency">
                                        <label for="">Agency</label>
                                    </div>
                                </div>
                                @error('describe_you')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="mainLabel">What's your budget *</label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="radio" name="budget" id="budget" value="500-1000">
                                        <label for="">£500 - £1000</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="budget" id="budget" value="1000-2000">
                                        <label for="">£1000 - £2000</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="budget" id="budget" value="2000-3000">
                                        <label for="">£2000 - £3000</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="budget" id="budget" value="3000-4000">
                                        <label for="">£3000 - £4000</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="budget" id="budget" value="4000-5000">
                                        <label for="">£4000 - £5000</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="budget" id="budget" value="5000+">
                                        <label for="">£5000+</label>
                                    </div>
                                </div>
                                @error('budget')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="mainLabel">What are you looking for? *</label>
                                <div class="form-group">
                                    @foreach($wid as $wid)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="looking_for" id="" value="{{ str_replace(' ', '_', $wid->title) }}">
                                            <label for="">{{ $wid->title }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('looking_for')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="mainLabel">What pages are required for your website?</label>
                                <textarea name="pages_required" id="" cols="30" rows="10">{{ old('pages_required') }}</textarea>
                                <small>Example: Home, Services, Services > Web Development, About, Contact</small>
                                @error('pages_required')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="mainLabel">Are there any websites that are similar to what you are looking for?</label>
                                <textarea name="similar_websites" id="" cols="30" rows="10">{{ old('similar_websites') }}</textarea>
                                @error('similar_websites')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="mainLabel">When are you looking to complete this project by?</label>
                                <input type="date" name="complete_project_by" id="complete_project_by" value="{{ old('complete_project_by') }}">
                                <small>Website generally take around 4-12 weeks to complete, custom applications completion times can vary.  Both depend upon the brief.</small>
                                @error('complete_project_by')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="mainLabel">Any other details?</label>
                                <textarea name="any_other_details" id="any_other_details" cols="30" rows="10">{{ old('any_other_details') }}</textarea>
                                @error('any_other_details')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Personal Details</h2>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="mainLabel">First Name *</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mainLabel">Last Name *</label>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="mainLabel">Company Name (if applicable)</label>
                                <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}">
                                @error('company_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="mainLabel">Email Address *</label>
                                <input type="email" name="email_address" id="email_address" value="{{ old('email_address') }}">
                                @error('email_address')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mainLabel">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">
                                    Send Brief <i class="fa-regular fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
