@extends('layouts.app')

@section('content')
<div class="container">
    <form class="card" action="{{ route('exam.update-mark', $exam) }}" method="POST">
        <div class="card-header">Muat Naik Markah - {{ $exam->title }}</div>
        <div class="card-body">
            @csrf

            <div class="mb-3">
                <label for="file" class="form-label">Excel file</label>
                <input type="file" id="file" class="form-control" accept=".xlxs,.xls,.csv">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="#" class="btn btn-secondary">Muat turun sampel</a>
        </div>
    </form>
</div>
@endsection