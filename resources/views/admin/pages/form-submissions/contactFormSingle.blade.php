@extends('layouts.admin')
@push('page-title')
    Admin Contact Form Submission - {{ $submission->first_name }} {{ $submission->last_name }}
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
                    <h1>{{ $submission->first_name }} {{ $submission->last_name }}'s contact form submission</h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ route('admin.form-submissions.contact-form') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Contact Form Submissions
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive d-block d-md-table w-100">
                        <tbody>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{ $submission->first_name }} {{ $submission->last_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email Address</strong></td>
                                <td>{{ $submission->email_address }}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone Number</strong></td>
                                <td>{{ $submission->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>Company Name</strong></td>
                                <td>
                                    @if($submission->company_name)
                                        {{ $submission->company_name }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Reason for contacting</strong></td>
                                <td>{{ $submission->reason_for_contacting }}</td>
                            </tr>
                            <tr>
                                <td><strong>Your Message:</strong></td>
                                <td>{{ $submission->your_message }}</td>
                            </tr>
                            <tr>
                                <td><strong>How did you hear about me?</strong></td>
                                <td>{{ $submission->how_did_you_hear_about_me }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
