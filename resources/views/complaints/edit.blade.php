@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <h5 class="alert-heading">Berjaya!</h5>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ $complaint->exists ? route('complaint.update', $complaint) : route('complaint.store') }}" method="POST">
                @csrf
                @method($complaint->exists ? 'PUT' : 'POST')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $complaint->title) }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $complaint->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="is_enabled" class="form-label">Enabled</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_enabled" value="1" id="yes" @checked($complaint->is_enabled)>
                        <label class="form-check-label" for="yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_enabled" value="0" id="no" @checked(!$complaint->is_enabled)>
                        <label class="form-check-label" for="no">
                            No
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection