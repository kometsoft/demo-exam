@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <h5 class="alert-heading">Berjaya!</h5>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <a href="{{ route('exam.create') }}" class="btn btn-primary mb-3">Create New Exam</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $exam->title }}</td>
                <td>
                    <a href="{{ route('exam.edit-mark', $exam) }}" class="btn btn-primary btn-sm">Edit Mark</a>
                    <a href="{{ route('exam.import-mark', $exam) }}" class="btn btn-primary btn-sm">Import Mark</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection