@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Employee</h3>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>First Name *</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror">
            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Last Name *</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror">
            @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Company</label>
            <select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                <option value="">-- Select Company --</option>
                @foreach($companies as $id => $name)
                    <option value="{{ $id }}" {{ old('company_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
            @error('company_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
