@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Company</h3>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" value="{{ old('name', $company->name) }}" class="form-control @error('name') is-invalid @enderror">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $company->email) }}" class="form-control @error('email') is-invalid @enderror">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Logo (min 100×100)</label><br>
            @if($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="80" height="80" class="rounded mb-2">
            @endif
            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
            @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Website</label>
            <input type="text" name="website" value="{{ old('website', $company->website) }}" class="form-control @error('website') is-invalid @enderror">
            @error('website') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
