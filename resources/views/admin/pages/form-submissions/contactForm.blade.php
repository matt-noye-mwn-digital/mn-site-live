@extends('layouts.admin')
@push('page-title')
    Admin Contact Form Submissions
@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Contact Form Submissions</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Reason for contacting</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactFormSubmissions as $submission)
                                <tr>
                                    <td>{{ $submission->first_name }} {{ $submission->last_name }}</td>
                                    <td>{{ $submission->email_address }}</td>
                                    <td>{{ $submission->reason_for_contacting }}</td>
                                    <td>{{ date('d/m/Y', strtotime($submission->created_at)) }}</td>
                                    <td>{{ $submission->status }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('admin.form-submissions.contact-form-single', $submission->id) }}">View</a>
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
                    {{ $contactFormSubmissions->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
