@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
        <h1 class="text-center text-light mb-4">Edit Grant</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('grants.update', $grant->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="project_title" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="project_title" name="project_title" value="{{ $grant->project_title }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="project_description" class="form-label">Project Description</label>
                <textarea class="form-control" id="project_description" name="project_description" rows="3" required>{{ $grant->project_description }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="grant_amount" class="form-label">Grant Amount</label>
                <input type="number" class="form-control" id="grant_amount" name="grant_amount" value="{{ $grant->grant_amount }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="grant_provider" class="form-label">Grant Provider</label>
                <input type="text" class="form-control" id="grant_provider" name="grant_provider" value="{{ $grant->grant_provider }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $grant->start_date }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $grant->end_date }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="duration" class="form-label">Duration (Months)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ $grant->duration }}" required>
            </div>

            <!-- Project Leader Dropdown -->
            <div class="form-group mb-3">
                <label class="form-label" for="leader_id">Project Leader</label>
                <select class="form-control" id="leader_id" name="leader_id" required>
                    <option value="">Select Leader</option>
                    @foreach($academicians as $academician)
                        <option value="{{ $academician->id }}" 
                            {{ old('leader_id', $grant->leader_id ?? '') == $academician->id ? 'selected' : '' }}>
                            {{ $academician->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Project Members Checkboxes -->
            <div class="form-group mb-3">
                <label class="form-label" for="members">Project Members</label>
                @foreach ($academicians as $academician)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="members[]" id="member{{ $academician->id }}" value="{{ $academician->id }}"
                            {{ $grant->academicians->contains($academician->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="member{{ $academician->id }}">
                            {{ $academician->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-success btn-md" style="background-color: #28a745; border-color: #218838;">Update Grant</button>
            <a href="{{ route('grants.index') }}" class="btn btn-secondary btn-md ms-2">Cancel</a>
        </form>
    </div>
@endsection