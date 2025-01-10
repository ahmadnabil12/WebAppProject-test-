@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
    <h1 class="text-center text-light mb-4">
        Milestones for Grant: {{ $grant->project_title }}
    </h1>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #28a745; border-color: #218838; color: white;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #dc3545; border-color: #c82333; color: white;">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

   <!-- Add Milestone Button -->
   @can('isLeader', $grant)
    <div class="mb-3">
        <a href="{{ route('milestones.create', $grant->id) }}" class="btn btn-lg" style="background-color: #28a745; border-color: #218838; color: white;">Add New Milestone</a>
    </div>
    @endcan

    <!-- Table to display milestones -->
    <div class="card shadow-sm" style="background-color: #1e1e1e; border-color: #333;">
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped" style="background-color: #212529; color: white;">
                <thead class="table-dark">
                    <tr>
                        <th>Milestone Title</th>
                        <th>Completion Date</th>
                        <th>Deliverable</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($milestones as $milestone)
                        <tr>
                            <td>{{ $milestone->milestone_title }}</td>
                            <td>{{ \Carbon\Carbon::parse($milestone->completion_date)->format('d M, Y') }}</td>
                            <td>{{ $milestone->deliverable }}</td>
                            <td>{{ $milestone->status }}</td>
                            <td>{{ $milestone->remark }}</td>
                            <td class="d-flex">
                                <!-- View Button -->
                                <a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-sm me-2" style="background-color: #007bff; border-color: #0069d9;">View</a>

                                <!-- Edit Button (only for leader) -->
                                <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-sm me-2" style="background-color: #adb5bd; border-color: #6c757d;">Edit</a>
                                
                                <!-- Delete Button (only for leader) -->
                                <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" style="background-color: #dc3545; border-color: #dc3545;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No milestones available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
