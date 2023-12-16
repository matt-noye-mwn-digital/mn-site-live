@extends('layouts.admin')
@push('page-title')

@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageMain adminDashboardMain">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="smallGreyBox">
                        <h4>{!! $sevenDaysTotalVisitors !!}</h4>
                        <h6>in the last 7 days</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="bigGreyBox">
                        <div class="row mb-4 align-items-center">
                            <div class="col-md-9">
                                <h4>Latest contact form submission</h4>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('admin.form-submissions.contact-form') }}" class="viewAllBtn">View all <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <table class="table w-100 dataTablesTableBasic">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Reason for contacting</th>
                                    <th>Submitted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactFormSubmissions as $submission)
                                    <tr onclick="window.location.href='{{ route('admin.form-submissions.contact-form-single') }}'">
                                        <td>{{ $submission->first_name }} {{ $submission->last_name }}</td>
                                        <td>{{ $submission->email_address }}</td>
                                        <td>{{ $submission->phone_number }}</td>
                                        <td>{{ $submission->reason_for_contacting }}</td>
                                        <td>{{ date('d/m/Y', strtotime($sumission->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bigGreyBox">
                        <div class="row mb-4 align-items-center">
                            <div class="col-md-9">
                                <h4>Latest quote Requests</h4>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('admin.form-submissions.contact-form') }}" class="viewAllBtn">View all <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <table class="table w-100 dataTablesTableBasic">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Looking For</th>
                                <th>Budget</th>
                                <th>Submitted</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quoteFormSubmissions as $submission)
                                <tr onclick="window.location.href='{{ route('admin.form-submissions.contact-form-single') }}'">
                                    <td>{{ $submission->first_name }} {{ $submission->last_name }}</td>
                                    <td>{{ $submission->email_address }}</td>
                                    <td>{{ $submission->phone_number }}</td>
                                    <td>{{ $submission->looking_for }}</td>
                                    <td>£{{ $submission->budget }}</td>
                                    <td>{{ date('d/m/Y', strtotime($sumission->created_at)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
