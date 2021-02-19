@extends('base')
@section('title') Index @endsection
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="btn btn-sm btn-primary" href="{{ route('post.create') }}"> + Nuevo</a></li>
            </ul>
            <form action="{{ route('post.search') }}" method="POST" class="d-flex">
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
                <th>{{"TITTLE"}}</th>
                <th>{{"SUMMARY"}}</th>
                <th>{{"IMAGE"}}</th>
                <th>{{"DESCRIPTION"}}</th>
                <th>{{"OTRA"}}</th>
            </tr>
        </thead>
        <tbody>
            @if (count($posts) >= 1)
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row"> {{ $post-> id }} </td>
                        <td> {{ $post-> tittle }} </td>
                        <td> {{ $post-> summary }} </td>
                        <td scope="row"> <img src="{{asset('storage').'/.$post->image'}}" </td>
                        <td> {{ $post-> description }} </td>
                        <td> {{ $post-> otra }} </td>
                        <td>
                            <a href="{{ route ('post.edit', $post->id) }}" class="btn btn-primary">EDITAR</a>


                            <button type="submit" class="btn btn-danger" oneclick= return "confirm ( 'Desea elmiar el resgistro?')">ELIMINAR</button>
                            <form action="{{route("post.destroy" , $post->id)}}" method="post">
                            {{ csrf_field() }} {{--metodo de seguridad--}}
                            {{ @method_field("DELETE")}}

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
