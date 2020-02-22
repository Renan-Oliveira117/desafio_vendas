@extends('adminlte::page')

@section('title', 'Formulário de Pessoa')

@section('content_header')
    <h1>Formulário de Pessoas</h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @if (isset($pessoa))
        {!! Form::model($pessoa, ['url' => route('pessoa.update',$pessoa), 'method' => 'put']) !!}
    @else
        {!! Form::open(['url' => route('pessoa.store')]) !!}
    @endif
    <div class="form-group @error('nome') has-error @enderror">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome',null,['class'=>'form-control']) !!}
    @error('nome')
        <span class="help-block">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group @error('telefone') has-error @enderror">
    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::text('telefone',null,['class'=>'form-control']) !!}
    @error('telefone')
        <span class="help-block">{{$message}}</span>
    @enderror
    </div>

    <div class="form-group @error('cpf') has-error @enderror">
        {!! Form::label('cpf', 'CPF') !!}
        {!! Form::text('cpf',null,['class'=>'form-control']) !!}
        @error('cpf')
            <span class="help-block">{{$message}}</span>
        @enderror
        </div>

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

        <script>
            $('#cpf').mask('000.000.000-00', {reverse: true});
        </script>
@stop
