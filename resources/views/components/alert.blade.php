@foreach (['Peligro', 'Cuidado', 'Concluido', 'info'] as $msg)
    @if (Session::has("alert-$msg"))

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">{{$msg}}</h4>
        {{ Session::get("alert-$msg")}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    @endif

@endforeach
