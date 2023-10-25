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