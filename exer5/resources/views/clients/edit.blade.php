@extends('layouts.template')
@section('content')
    <h1>Editar cliente</h1>
    {!! Form::model($client,['method' => 'PATCH','route'=>['clients.update',$client->id]]) !!}
    <div class="form-group">
        {!! Form::label('Name', 'Nome:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Birth', 'Data de Nascimento:') !!}
        {!! Form::text('birth',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Address', 'Endereço:') !!}
        {!! Form::text('address',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Phone', 'Telefone:') !!}
        {!! Form::text('phone',null,['id' => 'phone','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop