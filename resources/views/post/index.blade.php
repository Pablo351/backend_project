@extends('base')
@section('title') Inicio @endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{"ID"}}</th>
                <th>{{"TITTLE"}}</th>
                <th>{{"AUTOR"}}</th>
                <th>{{"ACCIONES"}}</th>
            </tr>
        </thead>
        <tbody>
            @if (count($posts) >= 1)
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row"> {{$post->ID}} </td>
                        <td>{{$post->TITTLE}}</td>
                        <td>{{$post->AUTOR}}</td>
                        <td> editar | borrar</td>
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
