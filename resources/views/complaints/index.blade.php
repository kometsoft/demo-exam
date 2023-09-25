<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADUAN DEMO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>