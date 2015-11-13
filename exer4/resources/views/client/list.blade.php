@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de clientes</div>
                    <div class="panel-body">
                        @if (isset($success))
                            <div class="alert alert-success">
                                <strong>{{ $success }}</strong>
                            </div>
                        @endif
                        @if(count($clients))
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nome</th>
                                    <th>Data Nascimento</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>Opções</th>
                                </tr>
                                @foreach($clients as $client)
                                    <tr>
                                        <td><input type="text" class="form-control" disabled value="{{$client->name}}"></td>
                                        <td><input type="date" class="form-control" disabled value="{{$client->birth}}"></td>
                                        <td><input type="text" class="form-control" disabled value="{{$client->address}}"></td>
                                        <td><input type="tel" class="form-control" disabled value="{{$client->phone}}"></td>
                                        <td>
                                            <form method="POST" action="{{ url('clients') }}/delete/{{ $client->id }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a href="{{ url('clients') }}/edit/{{ $client->id }}" id="Editar{{$client->id}}">
                                                    <button type="button" class="btn btn-primary">Editar</button>
                                                </a>
                                                <button type="submit" class="btn btn-danger" id="Excluir{{$client->id}}">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <strong>Nenhum dado cadastrado</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection