@extends('layouts.admin')

@section('content')
    <div class="container mt-5" style="background-color: #f4f6f9; color: #2c3e50; padding: 40px; border-radius: 10px;">
        <h1 class="text-center text-dark mb-4">Grant Details</h1>

        <!-- Grant Details Card -->
        <div class="card shadow-sm" style="background-color: #ffffff; border-radius: 10px;">
            <div class="card-body">
                <h3 class="card-title text-center text-primary mb-4">Grant Information</h3>

                <!-- Project Title -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Project Title:</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $grant->project_title }}</p>
                    </div>
                </div>

                <!-- Project Description -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Project Description:</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $grant->project_description }}</p>
                    </div>
                </div>

                <!-- Grant Amount -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Grant Amount:</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ number_format($grant->grant_amount, 2) }}</p>
                    </div>
                </div>

                <!-- Grant Provider -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Grant Provider:</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $grant->grant_provider }}</p>
                    </div>
                </div>

                <!-- Start Date -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Start Date:</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ \Carbon\Carbon::parse($grant->start_date)->format('d M, Y') }}</p>
                    </div>
                </div>

                <!-- End Date -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>End Date:</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ \Carbon\Carbon::parse($grant->end_date)->format('d M, Y') }}</p>
                    </div>
                </div>

                <!-- Duration -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Duration (Months):</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $grant->duration }}</p>
                    </div>
                </div>

                <!-- Project Leader -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Project Leader:</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $grant->leader->name ?? 'No Leader Assigned' }}</p>
                    </div>
                </div>

                <!-- Project Members -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Project Members:</strong>
                    </div>
                    <div class="col-md-8">
                        @foreach ($members as $member)
                            <p>{{ $member->name }}@if (!$loop->last), @endif</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-secondary" style="background-color: #adb5bd; border-color: #6c757d;">Edit</a>
            <a href="{{ route('grants.index') }}" class="btn btn-secondary ms-2" style="background-color: #6c757d; border-color: #5a6268;">Back to List</a>
        </div>
    </div>
@endsection
