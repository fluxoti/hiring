
@extends('layouts.template')
@section('content')
    <h1>Criar cliente</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['url' => 'clients','id' =>'clients']) !!}
    <div class="form-group">
        {!! Form::label('Name', 'Nome:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Birth', 'Data de Nascimento:') !!}
        {!! Form::input('date','birth',null,['type'=>'date','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Address', 'Endereço:') !!}
        {!! Form::text('address',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Phone', 'Telefone:') !!}
        {!! Form::text('phone',null,['id' => 'phone','class'=>'form-control', 'required'=>'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}



@stop