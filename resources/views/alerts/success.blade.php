@if (session($key ?? 'status'))
    <div class="alert alert-success" role="alert">
        {{ session($key ?? 'status') }}
    </div>
@elseif(session($key ?? 'danger'))
    <div class="alert alert-danger" role="alert">
        {{ session($key ?? 'danger') }}
    </div>
@endif
