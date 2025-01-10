@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
        <h1 class="text-center text-light mb-4">Grant Details</h1>

        <div class="mb-3">
            <strong>Project Title:</strong> {{ $grant->project_title }}
        </div>

        <div class="mb-3">
            <strong>Project Description:</strong> {{ $grant->project_description }}
        </div>

        <div class="mb-3">
            <strong>Grant Amount:</strong> {{ number_format($grant->grant_amount, 2) }}
        </div>

        <div class="mb-3">
            <strong>Grant Provider:</strong> {{ $grant->grant_provider }}
        </div>

        <div class="mb-3">
            <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($grant->start_date)->format('d M, Y') }}
        </div>

        <div class="mb-3">
            <strong>End Date:</strong> {{ \Carbon\Carbon::parse($grant->end_date)->format('d M, Y') }}
        </div>

        <div class="mb-3">
            <strong>Duration (Months):</strong> {{ $grant->duration }}
        </div>

        <div class="mb-3">
            <strong>Project Leader:</strong> {{ $grant->leader->name ?? 'No Leader Assigned' }}
        </div>

        <div class="mb-3">
            <strong>Project Members:</strong> 
            @foreach ($members as $member)
                {{ $member->name }}@if (!$loop->last), @endif
            @endforeach
        </div>

        <!-- Milestones Section -->
        <h5 class="mt-4 text-light">Milestones</h5>
        @if ($milestones->isNotEmpty())
            <table class="table table-bordered mt-3" style="background-color: #1e1e1e; color: white;">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Milestone Name</th>
                        <th>Target Completion Date</th>
                        <th>Deliverable</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($milestones as $index => $milestone)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $milestone->milestone_title }}</td>
                            <td>{{ \Carbon\Carbon::parse($milestone->completion_date)->format('d M, Y') }}</td>
                            <td>{{ $milestone->deliverable }}</td>
                            <td>{{ $milestone->status }}</td>
                            <td>{{ $milestone->remark }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-light">No milestones added yet.</p>
        @endif

        <div class="mb-3">
            @can ('isAdmin')
            <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-secondary" style="background-color: #adb5bd; border-color: #6c757d;">Edit</a>
            @endcan
            <a href="{{ route('grants.index') }}" class="btn btn-secondary ms-2" style="background-color: #6c757d; border-color: #5a6268;">Back to List</a>
        </div>
    </div>
@endsection



 <!--div class="mb-3">
            <strong>Project Members:</strong> 
            @foreach ($members as $member)
                {{ $member->name }},
            @endforeach
        </div-->

        <!--h2 class="mt-4">Project Members</h2>
            <ul class="list-group">
                @foreach ($members as $member)
                    <li class="list-group-item">{{ $member->name }}</li>
                @endforeach
            </ul-->