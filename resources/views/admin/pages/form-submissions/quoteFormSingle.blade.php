@extends('layouts.admin')
@push('page-title')
    Admin Quote Form Submission - {{ $submission->first_name }} {{ $submission->last_name }}
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
                    <h1>{{ $submission->first_name }} {{ $submission->last_name }}'s quote request</h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{ route('admin.form-submissions.quote-form') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Quote Form Submissions
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
                                <td><strong>Email Address</strong></td>
                                <td>{{ $submission->email_address }}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone Number</strong></td>
                                <td>{{ $submission->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>What best describes you?</strong></td>
                                <td>{{ $submission->describe_you }}</td>
                            </tr>
                            <tr>
                                <td><strong>Budget?</strong></td>
                                <td>{{ $submission->budget }}</td>
                            </tr>
                            <tr>
                                <td><strong>What are you looking for?</strong></td>
                                <td>{{ $submission->looking_for }}</td>
                            </tr>
                            <tr>
                                <td><strong>What pages are required?</strong></td>
                                <td>{{ $submission->pages_required }}</td>
                            </tr>
                            <tr>
                                <td><strong>Similar Websites</strong></td>
                                <td>{{ $submission->similar_websites }}</td>
                            </tr>
                            <tr>
                                <td><strong>Looking to complete project by</strong></td>
                                <td>{{ date('d/m/Y', strtotime($submission->complete_project_by)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Any other details</strong></td>
                                <td>{{ $submission->any_other_details }}</td>
                            </tr>
                            <tr>
                                <td><strong>Brief</strong></td>
                                <td>
                                    @if($submission->your_brief)
                                        <a href="{{ Storage::url($submission->your_brief) }}">
                                            {{ Storage::url($submission->your_brief) }}
                                        </a>
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>{{ $submission->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
