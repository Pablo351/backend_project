@extends('base')
@section('title') Categoria edit @endsection
@section('content')

<form action="{{ route('categoria.update', $categoria->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field("PATCH") }}

    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $categoria->name }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name= "description" id="description" class="form-control" cols="30" rows="10">{{ $categoria->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Edicion</button>
</form>
@endsection
