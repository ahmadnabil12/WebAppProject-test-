@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-center text-light">List of Academicians</h1>
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

        @can('isAdmin', App\Models\User::class)
        <!-- Button to add a new academician -->
        <div class="mb-3">
            <a href="{{ route('academicians.create') }}" class="btn btn-success btn-lg" style="background-color: #28a745; border-color: #218838;">Add New Academician</a>
        </div>
        @endcan

        <!-- Table to display academicians -->
        <div class="card shadow-sm" style="background-color: #1e1e1e; border-color: #333;">
            <div class="card-body">
                <table class="table table-hover table-bordered table-striped" style="background-color: #212529; color: white;">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Staff Number</th>
                            <th>Email</th>
                            <th>College</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($academicians as $academician)
                            <tr>
                                <td>{{ $academician->name }}</td>
                                <td>{{ $academician->staff_number }}</td>
                                <td>{{ $academician->email }}</td>
                                <td>{{ $academician->college }}</td>
                                <td>{{ $academician->department }}</td>
                                <td>{{ $academician->position }}</td>
                                <td class="d-flex">
                                    <!-- View Button -->
                                    <a href="{{ route('academicians.show', $academician->id) }}" class="btn btn-info btn-sm me-2" style="background-color: #007bff; border-color: #0069d9;">View</a>

                                    @can('isAdmin', App\Models\User::class)
                                    <!-- Edit Button -->
                                    <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-secondary btn-sm me-2 text-dark" style="background-color: #adb5bd; border-color: #6c757d;">Edit</a>
                                    @endcan

                                    @can('isAdmin', App\Models\User::class)
                                    <!-- Delete Button with confirmation -->
                                    <form action="{{ route('academicians.destroy', $academician->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="background-color: #dc3545; border-color: #dc3545;">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No academicians available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
