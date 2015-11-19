@extends('layouts/template')

@section('content')
    <h1>Clientes</h1>
    <a href="{{url('/clients/create')}}" class="btn btn-success">Criar cliente</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Nome</th>
            <th>Data de nascimento</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->birth }}</td>
                <td>{{ $client->address }}</td>
                <td>{{ $client->phone }}</td>

                <td><a href="{{url('clients',$client->id)}}" class="btn btn-primary">visualizar</a></td>
                <td><a href="{{route('clients.edit',$client->id)}}" class="btn btn-warning">Editar</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['clients.destroy', $client->id]]) !!}
                    {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection