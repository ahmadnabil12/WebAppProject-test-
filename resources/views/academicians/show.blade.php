@extends('layouts.admin')

@section('content')
    <div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
        <h1 class="text-center text-light mb-4">Academician Details</h1>

        <div class="mb-3">
            <strong>Name:</strong> {{ $academician->name }}
        </div>

        <div class="mb-3">
            <strong>Staff Number:</strong> {{ $academician->staff_number }}
        </div>

        <div class="mb-3">
            <strong>Email:</strong> {{ $academician->email }}
        </div>

        <div class="mb-3">
            <strong>College:</strong> {{ $academician->college }}
        </div>

        <div class="mb-3">
            <strong>Department:</strong> {{ $academician->department }}
        </div>

        <div class="mb-3">
            <strong>Position:</strong> {{ $academician->position }}
        </div>

        <div class="mb-3">
            <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-secondary">Edit</a>
            <a href="{{ route('academicians.index') }}" class="btn btn-secondary ms-2">Back to List</a>
        </div>
    </div>
@endsection
