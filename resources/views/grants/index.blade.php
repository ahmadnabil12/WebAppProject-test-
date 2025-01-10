@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-center text-light">List of Grants</h1>
            </div>
        </div>

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

        <!-- Button to add a new grant -->
        @can('isAdmin', App\Models\User::class) 
        <div class="mb-3">
            <a href="{{ route('grants.create') }}" class="btn btn-success btn-lg" style="background-color: #28a745; border-color: #218838;">Add New Grant</a>
        </div>
        @endcan

        <!-- Table to display grants -->
        <div class="card shadow-sm" style="background-color: #1e1e1e; border-color: #333;">
            <div class="card-body">
                <table class="table table-hover table-bordered table-striped" style="background-color: #212529; color: white;">
                    <thead class="table-dark">
                        <tr>
                            <th>Project Title</th>
                            <th>Project Description</th> 
                            <th>Grant Amount</th>
                            <th>Grant Provider</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration (Months)</th>
                            <th>Leader</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($grants as $grant)
                            <tr>
                                <td>{{ $grant->project_title }}</td>
                                <td>{{ $grant->project_description }}</td>
                                <td>{{ number_format($grant->grant_amount, 2) }}</td>
                                <td>{{ $grant->grant_provider }}</td>
                                <td>{{ \Carbon\Carbon::parse($grant->start_date)->format('d M, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($grant->end_date)->format('d M, Y') }}</td>
                                <td>{{ $grant->duration }}</td>
                                <td>{{ $grant->leader->name ?? 'No Leader Assigned' }}</td> <!-- Correct leader display -->
                               
                                <td class="d-flex">
                                    <!-- View Button -->
                                    <a href="{{ route('grants.show', $grant->id) }}" class="btn btn-info btn-sm me-2" style="background-color: #007bff; border-color: #0069d9;">View</a>

                                    @can('AdminStaff', App\Models\User::class)
                                    <!-- Edit Button -->
                                    <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-secondary btn-sm me-2" style="background-color: #adb5bd; border-color: #6c757d;">Edit</a>

                                    <!-- Delete Button with confirmation -->
                                    <form action="{{ route('grants.destroy', $grant->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="background-color: #dc3545; border-color: #dc3545;">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                                <tr>
                                    <td colspan="9" class="text-center">No grants available.</td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
