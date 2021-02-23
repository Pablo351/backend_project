@extends('base')
@section('title') Index @endsection
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="btn btn-sm btn-primary" href="{{ route('categoria.create') }}"> + Nuevo</a></li>
            </ul>
            <form action="{{ route('categoria.search') }}" method="POST" class="d-flex">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar">
                    <span class="input-group-btn">
                        <button class="btn btn-outline-info" type="submit"><span class="fas fa-search" aria-hidden="true"></span> Buscar</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</nav>

    <table class="table">
        <thead>
            <tr>
                <th>{{"ID"}}</th>
                <th>{{"NAME"}}</th>
                <th>{{"DESCRIPTION"}}</th>

            </tr>
        </thead>
        <tbody>
            @if (count($categoria) >= 1)
                @foreach ($categoria as $categoria)
                    <tr>
                        <td scope="row"> {{ $categoria->id }} </td>
                        {{-- <td scope="row"> {{ $post-> categoria-> name }} </td> --}}
                        <td> {{ $categoria->name }} </td>
                        <td> {{ $categoria->description }} </td>
                        <td>
                            <a href="{{ route ('categoria.edit', $categoria->id) }}" class="btn btn-sm btn-primary">EDITAR</a>



                            <form action="{{route("categoria.destroy" , $categoria->id)}}" method="post">
                                {{ csrf_field() }} {{--metodo de seguridad--}}
                                {{ method_field("DELETE")}}
                                <button type="submit" class="btn btn-sm btn-danger" onclick= "return confirm ('¿Desea eliminar el resgistro?')">ELIMINAR</button>


                            </form>
                        </td>
                    </tr>
                @endforeach

            @else
                <tr>
                    <td scope="row">{{"NO SE ENCUENTRAN RESULTADOS"}}</td>
                </tr>

            @endif


        </tbody>
    </table>
@endsection
