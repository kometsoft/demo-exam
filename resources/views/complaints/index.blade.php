@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <h5 class="alert-heading">Berjaya!</h5>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <a href="{{ route('complaint.create') }}" class="btn btn-primary mb-3">Create New Complaint</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Enabled</th>
                <th>Created date</th>
                <th>Updated date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $complaint)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $complaint->title }}</td>
                <td>{{ $complaint->description }}</td>
                <td>
                    <span @class([$complaint->is_enabled ? 'text-bg-success' : 'text-bg-danger', 'badge'])>
                        {{ $complaint->is_enabled ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                <td>{{ $complaint->updated_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('complaint.edit', $complaint) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('complaint.destroy', $complaint) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection