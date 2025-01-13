@extends('layouts.admin')
@section('content')
    <div class="container mt-5" style="background-color: #121212; color: white; padding: 20px; border-radius: 10px;">
        <h1 class="text-center text-light mb-4">Edit Academician</h1>

        <form action="{{ route('academicians.update', $academician->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $academician->name }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="staff_number" class="form-label">Staff Number</label>
                <input type="text" class="form-control" id="staff_number" name="staff_number" value="{{ $academician->staff_number }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $academician->email }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="college" class="form-label">College</label>
                <select name="college" id="college" class="form-control" required>
                <option value="College of Computing & Informatics (CCI)" {{ $academician->college == 'College of Computing & Informatics (CCI)' ? 'selected' : '' }}>College of Computing & Informatics (CCI)</option>
                    <option value="College of Engineering (COE)" {{ $academician->college == 'College of Engineering (COE)' ? 'selected' : '' }}>College of Engineering (COE)</option>
                    <option value="UNITEN Business School (UBS)" {{ $academician->college == 'UNITEN Business School (UBS)' ? 'selected' : '' }}>UNITEN Business School (UBS)</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="department" class="form-label">Department</label>
                <select name="department" id="department" class="form-control" required>
                    <option value="" disabled>Select Department</option>
                    <option value="Department of Computing" {{ $academician->department == 'Department of Computing' ? 'selected' : '' }}>Department of Computing</option>
                    <option value="Department of Informatics" {{ $academician->department == 'Department of Informatics' ? 'selected' : '' }}>Department of Informatics</option>
                    <option value="Department of Foundation and Diploma Studies" {{ $academician->department == 'Department of Foundation and Diploma Studies' ? 'selected' : '' }}>Department of Foundation and Diploma Studies</option>
                    <option value="Department of Electrical & Electronics Engineering" {{ $academician->department == 'Department of Electrical & Electronics Engineering' ? 'selected' : '' }}>Department of Electrical & Electronics Engineering</option>
                    <option value="Department of Mechanical Engineering" {{ $academician->department == 'Department of Mechanical Engineering' ? 'selected' : '' }}>Department of Mechanical Engineering</option>
                    <option value="Department of Civil Engineering" {{ $academician->department == 'Department of Civil Engineering' ? 'selected' : '' }}>Department of Civil Engineering</option>
                    <option value="Department of Accounting and Economic" {{ $academician->department == 'Department of Accounting and Economic' ? 'selected' : '' }}>Department of Accounting and Economic</option>
                    <option value="Department of Management" {{ $academician->department == 'Department of Management' ? 'selected' : '' }}>Department of Management</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="position" class="form-label">Position</label>
                <select name="position" id="position" class="form-control" required>
                    <option value="Professor" {{ $academician->position == 'Professor' ? 'selected' : '' }}>Professor</option>
                    <option value="Assoc. Prof." {{ $academician->position == 'Assoc. Prof.' ? 'selected' : '' }}>Assoc. Prof.</option>
                    <option value="Senior Lecturer" {{ $academician->position == 'Senior Lecturer' ? 'selected' : '' }}>Senior Lecturer</option>
                    <option value="Lecturer" {{ $academician->position == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Academician</button>
            <a href="{{ route('academicians.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
@endsection
