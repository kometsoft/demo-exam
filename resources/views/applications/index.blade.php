@extends('layouts.app')

@section('content')
    <div class="container py-5">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Berjaya!</h5>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <a href="{{ route('application.create') }}" class="btn btn-primary mb-3">Create New Application</a>
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
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $application->title }}</td>
                        <td>{{ $application->description }}</td>
                        <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('application.edit', $complaint) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('application.destroy', $complaint) }}" method="POST">
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
