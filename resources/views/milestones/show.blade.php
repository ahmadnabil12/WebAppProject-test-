@extends('layouts.admin')

@section('content')
    <div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
        <h1 class="text-center text-light mb-4">Milestone Details</h1>

        <div class="mb-3">
            <strong>Milestone Title:</strong> {{ $milestone->milestone_title }}
        </div>

        <div class="mb-3">
            <strong>Completion Date:</strong> {{ \Carbon\Carbon::parse($milestone->completion_date)->format('d M, Y') }}
        </div>

        <div class="mb-3">
            <strong>Deliverable:</strong> {{ $milestone->deliverable }}
        </div>

        <div class="mb-3">
            <strong>Status:</strong> {{ $milestone->status }}
        </div>

        <div class="mb-3">
            <strong>Remark:</strong> {{ $milestone->remark }}
        </div>

        <div class="mb-3">
            <strong>Grant Associated:</strong> {{ $milestone->grant->project_title }} <!-- Show the associated grant -->
        </div>

        <div class="mb-3">
            <strong>Date Updated:</strong> {{ \Carbon\Carbon::parse($milestone->updated_at)->format('d M, Y') }} <!-- Format the date -->
        </div>

        <!--div class="mb-3">
            <strong>Date Updated:</strong> {{ \Carbon\Carbon::parse($milestone->date_updated)->format('d M, Y') }}
        </div-->

        <div class="mb-3">
            <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-secondary">Edit</a>
            <a href="{{ route('milestones.index', $milestone->grant_id) }}" class="btn btn-secondary ms-2">Back to List</a>
        </div>
    </div>
@endsection
