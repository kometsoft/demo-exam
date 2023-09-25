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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>