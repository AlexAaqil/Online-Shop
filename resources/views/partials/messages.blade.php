@if(!empty(session('error')))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(!empty(session('success')))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
