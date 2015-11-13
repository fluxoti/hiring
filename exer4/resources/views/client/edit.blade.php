@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Atualizar cliente</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger erro">
                                <strong> Ocorreu um erro!</strong><br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (isset($success))
                            <div class="alert alert-success">
                                <strong>{{ $success }}</strong>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('clients/update') }}/{{ $client->id  }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Nome</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $client->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Data de nascimento</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="birth" value="{{ $client->birth }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Endereco</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" value="{{ $client->address }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Telefone</label>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" name="phone" value="{{ $client->phone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection