@extends('layouts.admin')
@push('page-title')
    Admin Edit Homepage
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
                    <h1>Edit Homepage</h1>
                </div>
            </div>
        </div>
    </section>

    <x-admin-errors-banner/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="" method="post">
                        @csrf
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
