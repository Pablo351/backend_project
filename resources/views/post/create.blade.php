@extends('base')
@section('title') Create @endsection
@section('content')

<form action= {{ route ('post.store') }} method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="mb-3">
        <label for="tittle" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="tittle" name="tittle">
    </div>

    <div class="form-group has-feedback">
        <label class="form-label">Categoria</label>
        <select name="categoria_id" class="form-select" required>
            <option value="">Seleccionar Categoria</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label" !Required> Imagen </label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <div class="mb-3">
        <label for="summary" class="form-label"> Resumen </label>
        <input type="text" class="form-control" id="summary" name="summary">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name= "description" id="description" class="form-control" cols="30" rows="10"> </textarea>
    </div>

    <div class="mb-3">
        <label for="otra" class="form-label"> Otra </label>
        <textarea name= "otra" id="otra" class="form-control" cols="30" rows="10"> </textarea>
    </div>



    <button type="submit" class="btn btn-primary">Guardar</button>


</form>

@endsection

