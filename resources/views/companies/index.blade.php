@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Companies</h3>
        <a href="{{ route('companies.create') }}" class="btn btn-primary">+ Add Company</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th width="150">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $key => $company)
                <tr>
                    <td>{{ $companies->firstItem() + $key }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email ?? '-' }}</td>
                    <td>
                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50" height="50" class="rounded">
                        @else
                            <span class="text-muted">No Logo</span>
                        @endif
                    </td>
                    <td>
                        @if ($company->website)
                            <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this company?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No companies found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $companies->links() }}
    </div>
</div>
@endsection
