@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->isNotEmpty())
    <div class="alert alert-danger mb-3" role="alert">
        <h5 class="alert-heading">Whoops! Error occured!</h5>
        <ol>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <h5 class="alert-heading">Berjaya!</h5>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <form class="card" action="{{ route('exam.update-mark', $exam) }}" method="POST">
        <div class="card-header">Kemaskini Markah - {{ $exam->title }}</div>
        <div class="card-body">
            @csrf
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>No. K.P.</th>
                        <th>Markah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exam->users as $user)
                    <tr>
                        <th>{{ $loop->iteration }}.</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nric_no }}</td>
                        <td>
                            <input type="number" class="form-control w-25" name="marks[{{ $user->id }}][mark]" value="{{ $user->pivot->mark }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection