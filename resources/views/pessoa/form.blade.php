@extends('adminlte::page')

@section('title', 'Formulário de Pessoa')

@section('content_header')
    <h1>Formulário de Pessoas</h1>
@stop

@section('content')
    @if (isset($pessoa))
        {!! Form::model($pessoa, ['url' => route('pessoa.update',$pessoa), 'method' => 'put']) !!}
    @else
        {!! Form::open(['url' => route('pessoa.store')]) !!}
    @endif
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome') !!}

    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::text('telefone') !!}

    {!! Form::label('email', 'E-mail') !!}
    {!! Form::text('email') !!}

    {!! Form::label('cep', 'CEP') !!}
    {!! Form::text('cep') !!}

    {!! Form::label('logradouro', 'Logradouro') !!}
    {!! Form::text('logradouro') !!}

    {!! Form::label('bairro', 'Bairro') !!}
    {!! Form::text('bairro') !!}
    {!! Form::label('localidade', 'Localidade') !!}
    {!! Form::text('localidade') !!}

    {!! Form::label('grupo') !!}
    {!! Form::select('grupo',$grupo)!!}

    {!! Form::submit('Salvar') !!}
    {!! Form::close() !!}
@stop

@section('css')
@stop

@section('js')
@stop
