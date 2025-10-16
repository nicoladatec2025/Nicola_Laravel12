@if (session('success'))
    <div class="alert-primary">
        <span>{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif
