@extends('layouts/template')
@section('content')
    <h1>Client Show</h1>

    <form class="form-horizontal">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$client->name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="birth" class="col-sm-2 control-label">Data de Nascimento</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder={{$client->birth}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Endereço</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" placeholder={{$client->address}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Telefone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="publisher" placeholder={{$client->phone}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('clients')}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>
@stop