@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
        <h1 class="text-center text-light mb-4">Create New Milestone</h1>

        <form action="{{ route('milestones.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="milestone_title" class="form-label">Milestone Title</label>
                <input type="text" class="form-control" id="milestone_title" name="milestone_title" required>
            </div>

            <div class="form-group mb-3">
            <label>Grant List</label>
            <select class="form-control" name="grant_id" required>
                <option value="">Select Grant</option>
                @foreach($grants as $grant)
                    <option value="{{ $grant->id }}">{{ $grant->project_title }}</option>
                @endforeach
            </select>
            </div>

            <div class="form-group mb-3">
                <label for="completion_date" class="form-label">Completion Date</label>
                <input type="date" class="form-control" id="completion_date" name="completion_date" required>
            </div>

            <div class="form-group mb-3">
                <label for="deliverable" class="form-label">Deliverable</label>
                <input type="text" class="form-control" id="deliverable" name="deliverable" required>
            </div>

            <div class="form-group mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="remark" class="form-label">Remark</label>
                <input type="text" class="form-control" id="remark" name="remark" required>
            </div>
            
            <!--div class="form-group mb-3">
                <label for="date_updated" class="form-label">Date Updated</label>
                <input type="date" class="form-control" id="date_updated" name="date_updated" required>
            </div-->

            <button type="submit" class="btn btn-success btn-md" style="background-color: #28a745; border-color: #218838;">Save Milestone</button>
            <a href="{{ route('milestones.index') }}" class="btn btn-secondary btn-md ms-2">Cancel</a>
        </form>
    </div>
@endsection
