@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Employees</h3>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Add Employee</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th width="150">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $key => $employee)
                <tr>
                    <td>{{ $employees->firstItem() + $key }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company?->name ?? '-' }}</td>
                    <td>{{ $employee->email ?? '-' }}</td>
                    <td>{{ $employee->phone ?? '-' }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this employee?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No employees found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

   <div class="d-flex justify-content-center">
    {!! $employees->links('pagination::bootstrap-5') !!}
</div>

</div>
@endsection
