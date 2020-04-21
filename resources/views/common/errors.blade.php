@if (count($errors) > 0)

<div aria-live="polite" aria-atomic="true">
    <div class="toast info-toast">
        <div class="alert alert-danger m-0">
            <strong class="title">Whoops! Something went wrong!</strong>
            <br>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endif